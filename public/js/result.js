document.addEventListener('DOMContentLoaded', () => {
    const resultcontent = document.querySelector('.result-content');
    const question = sessionStorage.getItem('question');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    /////////////////////////Loading//////////////////////////
    const citations = document.querySelector('.citations');
    const loadingElement = document.getElementById("loading");
    const citationsTittle = document.querySelector(".citations-tittle");

    let dotCount = 1;
    setInterval(() => {
        loadingElement.textContent = "Loading" + ".".repeat(dotCount);
        dotCount++;
    }, 1000);
    //////////////////////////////////////////////////////////

    // console.log(question);

    fetch('/~se2a_24_lara/public/api/chat', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({
            messages: [{ role: 'user', content: question }],
            model: 'sonar-pro',
            temperature: '0'
        })
    })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.choices && data.choices[0] && data.choices[0].message.content) {
                // console.log(data);
                resultcontent.textContent = data.choices[0].message.content;
                loadingElement.style.display = "none";
                citationsTittle.textContent = '参考：';
                citations.innerHTML = data.citations.map(citation => `<a href="${citation}" target="_blank">${citation}</a>`).join('<br>');
            } else {
                resultcontent.textContent = 'No valid response from API.';
            }
        })
        .catch(err => {
            console.error(err);
            resultcontent.textContent = 'An error occurred. Please check the console for details.';
        });
});

