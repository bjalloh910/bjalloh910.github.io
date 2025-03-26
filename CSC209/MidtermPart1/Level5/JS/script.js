function addRow(name, part1, part2) {
    const newRow = `<tr>
      <td>${name}</td>
      <td><i class="fa ${part1}"></i></td>
      <td><i class="fa ${part2}"></i></td>
    </tr>`;
    //alert(newRow);
    document.getElementById("myTable").innerHTML += newRow;
  }
  addRow('Sample text', 'fa-remove', 'fa-check');