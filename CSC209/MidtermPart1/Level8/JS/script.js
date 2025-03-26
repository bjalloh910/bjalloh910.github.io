let NRROWS = 10;

let FEATURES = [];
let BASIC = [];
let PRO = [];

function addSingleRow(index) {
  const table = document.getElementById("myTable");
  const row = table.insertRow(-1);
  row.innerHTML = `
    <td>${FEATURES[index]}</td>
    <td><i class="fa ${BASIC[index]}"></i></td>
    <td><i class="fa ${PRO[index]}"></i></td>
  `;
}

function addAllRows() {
  for(let i = 0; i < NRROWS; i++) {
    addSingleRow(i);
  }
}


FEATURES = ["Feature 1", "Feature 2", "Feature 3", "Feature 4", "Feature 5", 
           "Feature 6", "Feature 7", "Feature 8", "Feature 9", "Feature 10"];
BASIC = ["fa-check", "fa-remove", "fa-check", "fa-remove", "fa-check",
        "fa-remove", "fa-check", "fa-remove", "fa-check", "fa-remove"];
PRO = ["fa-check", "fa-remove", "fa-remove", "fa-check", "fa-remove",
        "fa-check", "fa-check", "fa-remove", "fa-check", "fa-remove"];

addAllRows();