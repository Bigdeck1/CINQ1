<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
    * {
        transition: all 0.25s ease;
        animation: fadeIn 1s;
    }
    .table {
        width: 100%;
        margin: 20px 0;
        border-collapse: collapse;
        font-family: Arial, sans-serif; /* Change the font family */
    }
    .table th, .table td {
        border: 1px solid #ddd;
        padding: 12px; /* Increase the padding */
        text-align: left;
        transition: background-color 0.5s ease; /* Add transition effect */
    }
    .table tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    .table tr:hover {
        background-color: #ddd;
    }
    .table th {
        
        background-color:  #00c6ff;

        color: white;
        text-transform: uppercase; /* Make the header text uppercase */
    }
    .dropdown-item {
        display: flex;
        align-items: center;
        transition: background-color 0.5s ease; /* Add transition effect */
    }
    .dropdown-item:hover {
        background-color: #f2f2f2; /* Add hover effect */
    }
    .dropdown-item i {
        margin-right: 5px;
    }
    /* Add some styling to the dropdown button */
    .btn-secondary {
        background-color: #25a1df; /* Change the button color */
        border: none;
        color: white;
        padding: 10px 24px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        transition-duration: 0.4s;
        cursor: pointer;
        border-radius: 12px; /* Make the button rounded */
        font-family: Arial, sans-serif; /* Change the font */
    }
    .btn-secondary:hover {
        background-color: white; 
        color: #4caf50;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); /* Add a shadow effect on hover */
    }
    .btn-secondary:active {
        background-color: #3e8e41; /* Change the background color when button is clicked */
        box-shadow: 0 5px #666;
        transform: translateY(4px); /* Move the button down when clicked */
    }

    @keyframes slideIn {
        0% {
            transform: translateX(-100%);
            opacity: 0;
        }
        100% {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .show-dropdown .dropdown-menu {
        animation: slideIn 0.5s forwards;
    }

    @keyframes fadeIn {
        0% {opacity: 0;}
        100% {opacity: 1;}
    }

    /* Define a fade out animation */
    @keyframes fadeOut {
        0% {opacity: 1;}
        100% {opacity: 0;}
    }
    
    .dropdown-menu:not(:hover) {
        animation: slideOut 0.5s forwards;
    }

    .back-button {
        display: inline-block;
        padding: 10px 20px;
        margin: 20px 0;
        font-size: 18px;
        color: #fff;
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    
    .back-button:hover {
        background-color: #0056b3;
        transform: scale(1.1);
    }

    .container {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

        .ui.segment {
            background: linear-gradient(to right, #0072ff, #00c6ff);
            text-align: center;
        }
        
    .ui.segment  p {
        margin-bottom: 10px;
    }
    
    .ui.segment  .callus {
        margin-top: 20px;
    }
    
    footer h2 {
        font-size: 20px; 
    }
    
    footer ul {
        list-style-type: none;
        padding: 0; 
    }
    
    footer ul li {
        display: inline;
        margin-right: 10px; 
    }
    
    footer ul li a {
        color: #fff; 
        text-decoration: none;
        transition: color 0.3s; 
    }
    
    footer ul li a:hover {
        color: #f00; 
    }
</style>
</head>
<body>
<table class="table table-striped table-hover">
    <tbody>
            <tr>
                <th>GRADE-12 1ST SEMESTER SUBJECTS</th>
                <th>Lesson Files</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>CONTEMPORARY ARTS FROM THE REGIONS</td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">file_download</i> Select File
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <a class="dropdown-item" href="lessons/PE_LESSON1_INTRODUCTION.pdf" download><i class="material-icons">description</i> PE Lesson 1</a>
                            <a class="dropdown-item" href="lessons/PE_LESSON2_ACTIVITY.pdf" download><i class="material-icons">description</i> PE Lesson 2</a>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
        </tr>

        <tr>
            <td>MEDIA AND INFORMATION LITERACY</td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton16" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">file_download</i> Select File
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton16">
                        <a class="dropdown-item" href="lessons/PE_LESSON1_INTRODUCTION.pdf" download><i class="material-icons">description</i> PE Lesson 1</a>
                        <a class="dropdown-item" href="lessons/PE_LESSON2_ACTIVITY.pdf" download><i class="material-icons">description</i> PE Lesson 2</a>
                    </div>
                </div>
            </td>
        </tr>

        <tr>
            <td>PHYSICAL EDUCATION AND HEALTH 3 </td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton18" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">file_download</i> Select File
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton18">
                        <a class="dropdown-item" href="lessons/PE_LESSON1_INTRODUCTION.pdf" download><i class="material-icons">description</i> PE Lesson 1</a>
                        <a class="dropdown-item" href="lessons/PE_LESSON2_ACTIVITY.pdf" download><i class="material-icons">description</i> PE Lesson 2</a>
                    </div>
                </div>
            </td>
        </tr>

        <tr>
            <td>UNDERSTANDING CULTURE SOCIETY AND POLITICS</td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton19" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">file_download</i> Select File
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton19">
                        <a class="dropdown-item" href="lessons/PE_LESSON1_INTRODUCTION.pdf" download><i class="material-icons">description</i> PE Lesson 1</a>
                        <a class="dropdown-item" href="lessons/PE_LESSON2_ACTIVITY.pdf" download><i class="material-icons">description</i> PE Lesson 2</a>
                    </div>
                </div>
            </td>
        </tr>

        <tr>
            <td>ENGLISH FOR ACADEMIC AND PROFESSIONAL PURPOSES</td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton20" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">file_download</i> Select File
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton20">
                        <a class="dropdown-item" href="lessons/PE_LESSON1_INTRODUCTION.pdf" download><i class="material-icons">description</i> PE Lesson 1</a>
                        <a class="dropdown-item" href="lessons/PE_LESSON2_ACTIVITY.pdf" download><i class="material-icons">description</i> PE Lesson 2</a>
                    </div>
                </div>
            </td>
        </tr>

        <tr>
            <td>PAGSULAT SA FILIPINO SA PILING LARANGAN (AKADEMIK)</td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton21" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">file_download</i> Select File
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton21">
                        <a class="dropdown-item" href="lessons/PE_LESSON1_INTRODUCTION.pdf" download><i class="material-icons">description</i> PE Lesson 1</a>
                        <a class="dropdown-item" href="lessons/PE_LESSON2_ACTIVITY.pdf" download><i class="material-icons">description</i> PE Lesson 2</a>
                    </div>
                </div>
            </td>
        </tr>

        <tr>
            <td>GENERAL BIOLOGY 1</td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton22" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">file_download</i> Select File
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton22">
                        <a class="dropdown-item" href="lessons/PE_LESSON1_INTRODUCTION.pdf" download><i class="material-icons">description</i> PE Lesson 1</a>
                        <a class="dropdown-item" href="lessons/PE_LESSON2_ACTIVITY.pdf" download><i class="material-icons">description</i> PE Lesson 2</a>
                    </div>
                </div>
            </td>
        </tr>

        <tr>
            <td>GENERAL PHYSICS 1</td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton23" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">file_download</i> Select File
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton23">
                        <a class="dropdown-item" href="lessons/PE_LESSON1_INTRODUCTION.pdf" download><i class="material-icons">description</i> PE Lesson 1</a>
                        <a class="dropdown-item" href="lessons/PE_LESSON2_ACTIVITY.pdf" download><i class="material-icons">description</i> PE Lesson 2</a>
                    </div>
                </div>
            </td>
        </tr>
        <!-- Add more rows as needed -->
    </tbody>
</table>


<div class="container" data-aos="fade" data-aos-delay="200"> <!-- Added container class with flexbox styles -->
    <a href="subjects.php" class="back-button">Back</a>
</div>

<footer class="ui segment animate__animated animate__fadeIn">
    <div class="ui containers">
        <p>© 2024 CINQ. All rights reserved.</p>
        <p>Contact: CINQ@gmail.com </p>
        <p>
            <i class="map marker alternate icon address-icon"></i>
            M.L QUEZON EXT. ANTIPOLO CITY
        </p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.querySelectorAll('.dropdown-toggle').forEach(button => {
            button.addEventListener('click', () => {
                const dropdownMenu = button.nextElementSibling;
                dropdownMenu.classList.toggle('show');
            });
        });

        document.querySelectorAll('.dropdown-item').forEach(item => {
            item.addEventListener('click', (event) => {
                event.preventDefault(); // Prevent the default behavior of anchor tags
                const fileName = item.dataset.file;
                const dropdownToggle = item.closest('.dropdown').querySelector('.dropdown-toggle span');
                dropdownToggle.textContent = fileName;
                // Optionally, you can trigger the download here
                // window.location.href = item.href;
            });
        });
    </script>                   
</body>
</html>