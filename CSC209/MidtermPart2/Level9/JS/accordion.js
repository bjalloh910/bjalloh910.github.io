let NRIMAGES = 5;  // this is the global variable that controls how many sections will be created


function createAccordionSections() {

    const container = document.body;
    
    for (let i = 1; i <= NRIMAGES; i++) {
       
        const button = document.createElement("button");
        button.className = "accordion";
        button.textContent = `Section ${i}`;
        
        // add the panel div
        const panel = document.createElement("div");
        panel.className = "panel";
        
        
        const link = document.createElement("a");
        link.href = `../Images/pic${i}.jpg`;
        link.download = "";
        link.textContent = `Download Image ${i}`;
        
        panel.appendChild(link);
        container.appendChild(button);
        container.appendChild(panel);
    }
}


createAccordionSections(); // the sections will appear as soon as the page loads


// each btn gets a click event listener to ret
let acc = document.getElementsByClassName("accordion");
for (let i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", toggleFunction);
}

function toggleFunction() {
    this.classList.toggle("active");
    let panel = this.nextElementSibling;
    if (panel.style.display === "block") {
        panel.style.display = "none";
    } else {
        panel.style.display = "block";
    }
}