
    function sortStarsDown() {
      let table, rows, switching, i, x, y, shouldSwitch, dir, element;
      table = document.getElementById("myTable");
      switching = true;
      dir = 0;

      while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
          shouldSwitch = false;
          x = rows[i].getElementsByClassName("sort_stars")[0];

          y = rows[i + 1].getElementsByClassName("sort_stars")[0];


          if(dir == 0) {
            if (Number(x.innerHTML) > Number(y.innerHTML)) {
              shouldSwitch = true;
              break;
            }
          }else {
            if (Number(x.innerHTML) < Number(y.innerHTML)) {
              shouldSwitch = true;
              break;
            }
          }

        }

        if (shouldSwitch) {
          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
          switching = true;
        }
      }
    }


    function sortStarsUp() {
      let table, rows, switching, i, x, y, shouldSwitch, dir, element;
      table = document.getElementById("myTable");
      switching = true;
      dir = 1;
      while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
          shouldSwitch = false;
          x = rows[i].getElementsByClassName("sort_stars")[0];

          y = rows[i + 1].getElementsByClassName("sort_stars")[0];


          if(dir == 0) {
            if (Number(x.innerHTML) > Number(y.innerHTML)) {
              shouldSwitch = true;
              break;
            }
          }else {
            if (Number(x.innerHTML) < Number(y.innerHTML)) {
              shouldSwitch = true;
              break;
            }
          }

        }

        if (shouldSwitch) {

          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
          switching = true;
        }
      }
    }




//
//
//
//
//
//



    function sortCurrentStarsDown() {
      let table, rows, switching, i, x, y, shouldSwitch, dir, element;
      table = document.getElementById("myTable");
      switching = true;
      dir = 0;

      while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
          shouldSwitch = false;
          x = rows[i].getElementsByClassName("sort_current")[0];

          y = rows[i + 1].getElementsByClassName("sort_current")[0];


          if(dir == 0) {
            if (Number(x.innerHTML) > Number(y.innerHTML)) {
              shouldSwitch = true;
              break;
            }
          }else {
            if (Number(x.innerHTML) < Number(y.innerHTML)) {
              shouldSwitch = true;
              break;
            }
          }

        }

        if (shouldSwitch) {
          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
          switching = true;
        }
      }
    }


    function sortCurrentStarsUp() {
      let table, rows, switching, i, x, y, shouldSwitch, dir, element;
      table = document.getElementById("myTable");
      switching = true;
      dir = 1;
      while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
          shouldSwitch = false;
          x = rows[i].getElementsByClassName("sort_current")[0];

          y = rows[i + 1].getElementsByClassName("sort_current")[0];


          if(dir == 0) {
            if (Number(x.innerHTML) > Number(y.innerHTML)) {
              shouldSwitch = true;
              break;
            }
          }else {
            if (Number(x.innerHTML) < Number(y.innerHTML)) {
              shouldSwitch = true;
              break;
            }
          }

        }

        if (shouldSwitch) {

          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
          switching = true;
        }
      }
    }










