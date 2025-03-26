let NRROWS = 10;

let FEATURES = [];
let BASIC = [];
let PRO = [];

function addRow() {
  const table = document.getElementById("myTable");
  for(let i = 0; i < NRROWS; i++) {
    const row = table.insertRow(-1);
    row.innerHTML = `
      <td>${FEATURES[i]}</td>
      <td><i class="fa ${BASIC[i]}"></i></td>
      <td><i class="fa ${PRO[i]}"></i></td>
    `;
  }
}
  

FEATURES = ["Sample text 2", "Sample text 3", "Sample text 4", "Sample text 5", "Sample text 6", 
           "Sample text 7", "Sample text 8", "Sample text 9", "Sample text 10", "Sample text 11"];
BASIC = ["fa-check", "fa-remove", "fa-check", "fa-remove", "fa-check",
        "fa-remove", "fa-check", "fa-remove", "fa-check", "fa-remove"];
PRO = ["fa-check", "fa-remove", "fa-remove", "fa-check", "fa-remove",
      "fa-check", "fa-check", "fa-remove", "fa-check", "fa-remove"];

addRow();