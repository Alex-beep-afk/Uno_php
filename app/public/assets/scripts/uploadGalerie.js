

const uploadFileInput = document.querySelector('#image');
const previewContainer = document.querySelector('#previewContainer');
const uploadForm = document.querySelector('#uploadForm');

let validFiles = [];

uploadFileInput.addEventListener('change', function () {
    previewContainer.innerHTML = '';
    validFiles = [];

    const files = Array.from(uploadFileInput.files);

    files.forEach(file => {
        if (!file.type.startsWith('image/')) {
            alert(`${file.name} n'est pas une image valide.`);
            return;
        }
        if (file.size > 2 * 1024 * 1024) {
            alert(`${file.name} dépasse la limite de 2Mo.`);
            return;
        }
        validFiles.push(file);
    });

    displayPreviews();
});

function displayPreviews() {
    previewContainer.innerHTML = '';

    validFiles.forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = function (event) {
            const imgWrapper = document.createElement('div');
            imgWrapper.className = "flex flex-col items-center m-2";

            imgWrapper.innerHTML = `
                <img src="${event.target.result}" alt="${file.name}" class="w-32 h-32 object-cover rounded">
                <button class="remove-button mt-2 p-1 bg-red-500 text-white rounded hover:bg-red-700">Supprimer</button>
            `;

            imgWrapper.querySelector('.remove-button').addEventListener('click', () => {
                validFiles.splice(index, 1);
                displayPreviews();
            });

            previewContainer.appendChild(imgWrapper);
        };
        reader.readAsDataURL(file);
    });
}

uploadForm.addEventListener('submit', async function (e) {
    e.preventDefault();

    if (validFiles.length === 0) {
        alert("Aucun fichier valide.");
        uploadFileInput.value = '';
        return;
    }

    const formData = new FormData();
    validFiles.forEach(file => formData.append('images[]', file));

    try {
        const res = await fetch('upload.php', {
            method: 'POST',
            body: formData
        });

        const data = await res.json();

        if (res.ok && data.success) {
            alert(data.message);
            uploadFileInput.value = '';
            validFiles = [];
            previewContainer.innerHTML = '';
        } else {
            alert("Erreur : " + data.message);
        }
    } catch (err) {
        console.error("Erreur réseau :", err.message);
        alert("Erreur réseau : " + err.message);
    }
});