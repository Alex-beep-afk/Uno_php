console.log("scoresModify.js loaded");

const scoresModifyForm = document.querySelectorAll("span[data-user]");

scoresModifyForm.forEach((span) => {
    span.addEventListener("blur", async (e) => {
        
        const user  = span.dataset.user; 
        const score = e.target.innerText.trim() ;

        if (/^\d+$/.test(score) === false) {
            span.innerText = "le score doit être un nombre entier positif";
            span.classList.add("text-red-500");
            span.classList.add("text-xs");
            span.classList.remove("text-green-500");
            return;
        }

        console.log(user, score);

        const reponse = await fetch(`/admin/api/scoresMod.php`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                
            },
            body: JSON.stringify({
                id: user,
                score: score
            })
            });

        if (reponse.ok) {
            const data = await reponse.json();
            console.log(data);
        }else{
            const data = await reponse.json();
            console.log(data);
        }

        
    })
});




