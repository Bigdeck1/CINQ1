<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> INDAK GALAW</title>
    <style>
        /* General styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-image: linear-gradient(to bottom, #027bff, #6faaeb);
            color: #000;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            padding-bottom: 50px; /* Adjusted padding to accommodate the back button */
        }

        .organization-box {
            max-width: 90%;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            text-align: left;
            margin-bottom: 30px; /* Added margin at the bottom */
        }

        .organization-box img {
            max-width: 100%;
            height: auto;
            border-radius: 15px;
            margin-bottom: 20px;
            transition: transform 0.3s ease-in-out;
        }

        .organization-box img:hover {
            transform: scale(1.1);
        }

        .organization-box p {
            line-height: 1.6;
            margin-bottom: 15px;
        }

        /* Back button styles */
        .back-button {
            padding: 12px 24px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            margin-top: auto; /* Push the button to the bottom */
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #0056b3;
        }

        /* Footer styles */
        .footer {
            width: 100%;
            background-color: #027bff;
            color: #fff;
            text-align: center;
            padding: 15px 0;
            position: fixed;
            bottom: 0;
            left: 0;
        }

        .footer p {
            margin: 0;
        }

        /* Animation keyframes */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animated {
            animation: fadeInUp 0.8s ease forwards;
        }

        /* Media query for medium-sized image */
        @media (min-width: 768px) {
            .organization-box img {
                max-width: 70%;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="organization-box animated">
            <img src="image/indak.jpg" alt="STEM Society">
            <p>Passion always comes with a great perspective, illuminating paths of possibility and inspiring boundless creativity.</p>
            <p>Address: H5GH+63F, Manuel L. Quezon Ext, Antipolo, 1870 Rizal</p>
            <p>Phone: (02) 8696 5415</p>
            <p>Coordinate with Mr. Jan Ives Justiniano</p>
            <p>Facebook: <a href="https://www.facebook.com/djanives?mibextid=ZbWKwL">https://www.facebook.com/djanives?mibextid=ZbWKwL</a></p>
        </div>

        <a href="organization.php" class="back-button">Back to Organization</a>
    </div>

    <footer class="footer">
        <p>&copy; 2024 CINQ. All rights reserved.</p>
    </footer>

</body>

</html>
