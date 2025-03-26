let NRROWS = 10;

function addRow(name, part1, part2) {
  const table = document.getElementById("myTable");
  for(let i = 0; i < NRROWS; i++) {
    const row = table.insertRow(-1);
    row.innerHTML = `
      <td>${name}</td>
      <td><i class="fa ${part1}"></i></td>
      <td><i class="fa ${part2}"></i></td>
    `;
  }
}
  
addRow('Sample text', 'fa-remove', 'fa-check');