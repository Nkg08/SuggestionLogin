<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "suggestionform";

$connection = mysqli_connect($servername, $username, $password, $dbname);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM suggestion";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="/Suggestion/img/NTPC-Logo.png" type="image/title-icon">
    <title>Reports</title>
    <link rel="stylesheet" href="/Suggestion/viewAll/viewAlll.css?v=3">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"
        media="all">
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
        <style>
.heading{
    margin-top: 60px;
  margin-bottom: 0;
  color: white;
  background-color: dodgerblue;
  text-align: center;
  margin-left: auto;
  margin-right: auto;
  width: 160px;
  border-radius: 10px;
}
  @media (max-width: 800px) and (min-width:657px){
.heading{
    margin-top: 13px;
  margin-bottom: 0;
  color: white;
  background-color: dodgerblue;
  text-align: center;
  margin-left: auto;
  margin-right: auto;
  width: 160px;
  border-radius: 10px;
}
  .logo {
    justify-content: center;
    margin-bottom: 10px;
    margin: auto 150px;
  }

  .logo img {
    width: 60px;
    height: 30px;
    margin-right: 0;
  }

  .header a {
    float: none;
    display: block;
    text-align: center;
    margin: 6px auto;
    padding: 8px 15px;
  }

  .header-right {
    float: none;
    margin-top: 10px;
    text-align: center;
    width: 100%;
  }
  .header {
    position: relative;
    top: auto;
    left: auto;
    width: auto;
  }
  .main {
    margin: auto;
    padding: 0px 10px;
  }
  
    .empty-state{
        padding:auto;
        margin: auto;    
    }
    .empty-state{
        width:auto;
    }
    .cssbuttons-io-button{
        margin:10px auto;
    }
    .empty-state {
      
      background: #ffffff;
      box-shadow: 1px 2px 10px #e1e3ec;
      border-radius: 4px;
      text-align: center;
      padding: 100px;
    }
    .responsive-table tr{
        border:1px solid dodgerblue;
        text-align: center;
    }
    

    .responsive-table th,
    .responsive-table td {
      display: block;
      box-sizing: border-box;
    }

    .responsive-table th {
      text-align: left;
      background-color: transparent;
      border: none; 
    }

    .responsive-table tbody td:before {
      content: attr(data-th) ": ";
      font-weight: bold;
      float: left; 
    }

    .responsive-table tbody td {
      padding-left: 100px; 
      display: block;
    }
  }
  @media (max-width: 657px) and (min-width:320px){
    .heading{
    margin-top: 13px;
  margin-bottom: 0;
  color: white;
  background-color: dodgerblue;
  text-align: center;
  margin-left: auto;
  margin-right: auto;
  width: 160px;
  border-radius: 10px;
}
    .logo {
    justify-content: center;
    margin-bottom: 10px;
    margin: auto 150px;
  }

  .logo img {
    width: 60px;
    height: 30px;
    margin-right: 0;
  }

  .header a {
    float: none;
    display: block;
    text-align: center;
    margin: 6px auto;
    padding: 8px 15px;
  }

  .header-right {
    float: none;
    margin-top: 10px;
    text-align: center;
    width: 100%;
  }
  .header {
    position: relative;
    top: auto;
    left: auto;
    width: auto;
  }
  .main {
    margin: auto;
    padding: 0px 10px;
  }
  
    .empty-state{
        padding:auto;
        margin: auto;    
    }
    .empty-state{
        width:auto;
    }
    .cssbuttons-io-button{
        margin:10px auto;
    }
    .empty-state {
      
      background: #ffffff;
      box-shadow: 1px 2px 10px #e1e3ec;
      border-radius: 4px;
      text-align: center;
      padding: 100px;
    }
    .responsive-table tr{
        border:1px solid dodgerblue;
        text-align: center;
    }
    

    .responsive-table th,
    .responsive-table td {
      display: block;
      box-sizing: border-box;
    }

    .responsive-table th {
      text-align: left;
      background-color: transparent;
      border: none; 
    }

    .responsive-table tbody td:before {
      content: attr(data-th) ": ";
      font-weight: bold;
      float: left; 
    }

    .responsive-table tbody td {
      padding-left: 100px; 
      display: block;
    }
    .filter_btn{
        margin-top:20px;
        /* margin-left: 230px;
        margin-right: 180px; */
        margin-bottom:15px;
    }
  }

  
        </style>
</head>

<body>

    <div>

        <div class="header">
            <a href="/Suggestion/index.html" class="logo"><img src="/Suggestion/img/NTPC-Logo.png" alt="">Online
                Suggestion Scheme</a>
            <div class="header-right">
                <a class="active hvr-icon-pulse" href="/Suggestion/index.html">Home <i
                        class="fa fa-home hvr-icon"></i></a>
                <a href="#logout" class="hvr-icon-buzz-out">Logout <i class="fa fa-lock hvr-icon"></i></a>

            </div>
        </div>
    </div>

    <div>
        <div class="main-body">
            <div class="sidebar">
                <!-- <p class="active" href="#home">Navigation</p> -->
            </div>
        </div>
    </div>
    <div>

    <?php if (mysqli_num_rows($result) > 0) : ?>
        <h1 class="heading" style="">Reports</h1>
        
        <div class="filter_btn">
<!-- filterBar option 1  -->

        <input class="text-box" type="text" id="tableFilter" placeholder="Search In Table" style="padding:5px;">

    
    <a href=""><img src="\Suggestion\img\excel.png" onclick="exportFilteredTable()" alt="" style="width: 36px;
  margin: -12px auto;"></a>
  <!-- <button class="export-button" onclick="clearFilter()">Clear Filter</button> -->
  <!-- <button class="export-button" onclick="exportFilteredTable()">Export Filtered Table to Excel</button> -->
<!-- <button class="filter-button" onclick="exportFullTable()">Export Full Table to Excel</button> -->

<!-- filterBar option 2 -->

<!-- <label><strong>Reports</strong></label> -->
    <!-- <select id="filterColumn">
        <option value="0">Suggestion Id</option>
        <option value="1">Submission Date</option>
        <option value="2">Area / Equipment</option>
        <option value="3">Present Status</option>
        <option value="4">Suggested Solution</option>
        <option value="5">Impact Options</option>
        <option value="6">Any Other Improvement</option>
        <option value="7">Saving Status</option>
        <option value="8">Suggestion Details</option>
        

    </select>
    <input type="text" id="filterValue" placeholder="Enter Value">
    <button onclick="filterTableByColumn()">Filter Table</button>
    <button onclick="clearFilter()">Clear Filter</button>
    <button onclick="exportFilteredTable()">Export Filtered Table</button>
    <button onclick="exportFullTable()">Export Full Table</button> -->
        </div>

        <table class="styled-table responsive-table">
            <thead>
                <tr>
                    <th data-th="Suggestion Id">Suggestion Id</th>
                    <th data-th="Submission Date">Submission Date</th>
                    <th data-th="Area / Equipment">Area / Equipment</th>
                    <th data-th="Present Status">Present Status</th>
                    <th data-th="Suggested Solution">Suggested Solution</th>
                    <th data-th="Impact Options">Impact Options</th>
                    <th data-th="Any Other Improvement">Any Other Improvement</th>
                    <th data-th="Saving Status">Saving Status</th>
                    <th data-th="Suggestion Details">Suggestion Details</th>
                    <th data-th="Supporting Document">Supporting Document</th>
                </tr>
            </thead>
            
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td data-th="Suggestion Id">
                        <?php echo $row['suggestion_id']; ?>
                    </td>
                    <td data-th="Submission Date">
                        <?php echo $row['submission_date']; ?>
                    </td>
                    <td data-th="Area / Equipment">
                        <?php echo $row['area_equipment']; ?>
                    </td>
                    <td data-th="Present Status">
                        <?php echo $row['present_status']; ?>
                    </td>
                    <td data-th="Suggested Solution">
                        <?php echo $row['suggested_solution']; ?>
                    </td>
                    <td data-th="Impact Options">
                        <?php echo $row['impact_options']; ?>
                    </td>
                    <td data-th="Any Other Improvement">
                        <?php echo $row['any_other_improvement']; ?>
                    </td>
                    <td data-th="Saving Status">
                        <?php echo $row['saving_status']; ?>
                    </td>
                    <td data-th="Suggestion Details">
                        <?php echo $row['suggestion_details']; ?>
                    </td>
                    <td data-th="Supporting Document">
                        <?php if (!empty($row['supporting_document'])) : ?>
                        <a href="<?php echo $row['supporting_document']; ?>" target="_blank">View Document</a>
                        <?php else : ?>
                        N/A
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endwhile; ?>
        
            </tbody>
        </table>
        <?php else : ?>
        <div>

            <div class="empty-state">
                <div class="empty-state__content">
                    <div class="empty-state__icon">
                        <img src="data:image/png;base64,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"
                            alt="">
                    </div>
                    <div class="empty-state__message">No records has been added yet.</div>

                    <div>
                        <button class="cssbuttons-io-button"> Add Record
                            <div class="icon">
                                <a href="/Suggestion/Submit/submit.html">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path fill="currentColor"
                                            d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z">
                                        </path>
                                    </svg></a>
                            </div>
                        </button>
                    </div>
                </div>
            </div>


            <?php endif; ?>

        </div>
    </div>


    </div>
   


    <!-- JScript filterBar option 1  -->
    <script>
        const input = document.getElementById("tableFilter");
        const table = document.querySelector(".styled-table");
        const originalTableRows = Array.from(table.querySelectorAll("tbody tr"));

        input.addEventListener("input", filterTable);

        // Function to filter the table
        function filterTable() {
            const filterValue = input.value.toLowerCase();
            originalTableRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filterValue) ? "" : "none";
            });
        }

        // Function to clear the filter
        function clearFilter() {
            input.value = "";
            originalTableRows.forEach(row => {
                row.style.display = "";
            });
        }

        // Function to export full table to Excel
        function exportFullTable() {
            const ws = XLSX.utils.table_to_sheet(table);
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "Full Table");
            XLSX.writeFile(wb, "full_table.xlsx");
        }

        // Function to export filtered table to Excel
        function exportFilteredTable() {
            const filterValue = input.value.trim().toLowerCase(); 
            // if (filterValue === "") {
            //     alert("Please enter a filter value before exporting.");
            //     return;
            // }

            const filteredRows = originalTableRows.filter(row => row.style.display !== "none");
            const filteredTable = document.createElement("table");
            filteredTable.innerHTML = table.innerHTML;
            filteredTable.querySelector("tbody").innerHTML = "";
            filteredRows.forEach(row => filteredTable.querySelector("tbody").appendChild(row));

            const ws = XLSX.utils.table_to_sheet(filteredTable);
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "Filtered Table");
            XLSX.writeFile(wb, "Suggestion.xlsx");
        }
    </script>

    <!-- JScipt filterBar option 2  -->
    <!-- <script>
        const filterColumnSelect = document.getElementById("filterColumn");
        const filterValueInput = document.getElementById("filterValue");
        const table = document.querySelector(".styled-table");
        const originalTableRows = Array.from(table.querySelectorAll("tbody tr"));

        // Add event listeners for the filter button and Enter key press
        document.querySelector("button[onclick='filterTableByColumn()']").addEventListener("click", filterTableByColumn);
        filterValueInput.addEventListener("keydown", (event) => {
            if (event.key === "Enter") {
                filterTableByColumn();
            }
        });

        // Function to filter the table by selected column and value
        function filterTableByColumn() {
            const columnIndex = parseInt(filterColumnSelect.value);
            const filterValue = filterValueInput.value.toLowerCase();

            originalTableRows.forEach(row => {
                const cellText = row.querySelectorAll("td")[columnIndex].textContent.toLowerCase();
                row.style.display = cellText.includes(filterValue) ? "" : "none";
            });
        }

        // Function to clear the filter
        function clearFilter() {
            filterValueInput.value = "";
            originalTableRows.forEach(row => {
                row.style.display = "";
            });
        }

        // Function to export full table to Excel
        function exportFullTable() {
            const ws = XLSX.utils.table_to_sheet(table);
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "Full Table");
            XLSX.writeFile(wb, "Suggestion_Full_Table.xlsx");
        }

        // Function to export filtered table to Excel
        function exportFilteredTable() {
            const columnIndex = parseInt(filterColumnSelect.value);
            const filterValue = filterValueInput.value.trim().toLowerCase();

            if (filterValue === "") {
                alert("Please enter a filter value before exporting.");
                return; 
            }

            const filteredRows = originalTableRows.filter(row => row.style.display !== "none");
            const filteredTable = document.createElement("table");
            filteredTable.innerHTML = table.innerHTML;
            filteredTable.querySelector("tbody").innerHTML = "";
            filteredRows.forEach(row => filteredTable.querySelector("tbody").appendChild(row));

            // Filter the rows further by the selected column and value
            filteredRows.forEach(row => {
                const cellText = row.querySelectorAll("td")[columnIndex].textContent.toLowerCase();
                if (!cellText.includes(filterValue)) {
                    row.style.display = "none";
                }
            });

            const ws = XLSX.utils.table_to_sheet(filteredTable);
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "Filtered Table");
            XLSX.writeFile(wb, "Suggestion_filtered_Table.xlsx");
        }
    </script> -->

    <script src="/script.js"></script>
</body>

</html>
<?php
mysqli_close($connection);
?>