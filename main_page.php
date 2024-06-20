<?php
session_start();

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atlanta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome for icons -->
    <style>
        /* General Styles */
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        /* Header */
        header {
            background-image: url("coast-2723729.jpg");
            background-size: cover;
            background-position: center;
            text-align: center;
            padding: 80px;
            color: #ffffff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Add text shadow for better readability */
        }

        header h1 {
            font-size: 48px;
            margin: 0;
        }

        header p {
            font-size: 24px;
            margin-top: 20px;
        }

        /* Navigation */
        nav {
            background-color: #57856b; /* Green navigation background */
            text-align: center;
        }

        nav a {
            display: inline-block;
            color: #ffffff;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #3c586d; /* Darker green on hover */
        }

        /* Row */
        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 20px;
        }

        /* Side column */
        .side {
            flex: 30%;
            background-color: #e9f7f9;
            padding: 20px;
            border-radius: 10px;
            margin-right: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Main column */
        .main {
            flex: 70%;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Footer */
        footer {
            background-color: #f0f0f0;
            padding: 20px;
            text-align: center;
            border-top: 2px solid #3c586d;
        }

        .social-links {
            list-style: none;
            padding: 0;
            margin: 10px 0;
        }

        .social-links li {
            display: inline-block;
            margin: 0 10px;
        }

        .social-links li a img {
            width: 40px; /* Increase the size of social media icons */
            height: 40px;
            border-radius: 50%;
            transition: transform 0.3s ease-in-out;
        }

        .social-links li a img:hover {
            transform: scale(1.2);
        }

        .a1 {
            font-size: 36px; /* Increase font size for header */
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Add text shadow */
        }

        /* Quote Styles */
        .quote-container {
            background-color: #f3f3f3;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .quote-container h1 {
            font-size: 24px;
            margin: 0;
            text-align: center;
            color: #333;
        }

        .quote-container .quote {
            font-style: italic;
            color: #555;
        }

        .quote-container .author {
            margin-top: 10px;
            font-size: 18px;
            color: #777;
            text-align: right;
        }

        .quote-container .buttons {
            margin-top: 20px;
            text-align: center;
        }

        .quote-container .next {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #57856b;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .quote-container .next:hover {
            background-color: #3c586d;
        }

        .quote-container .twitter {
            font-size: 24px;
            color: #1da1f2;
            text-decoration: none;
            margin-right: 10px;
        }

        /* Media Queries */
        @media screen and (max-width: 700px) {
            nav a {
                display: block;
                width: 100%;
            }

            .row {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

<header>
    <h1 class="a1">Atlanta</h1>
    <p>Just Do It!</p>
</header>

<nav role="navigation">
    <a href="index.html">Calendar</a>
    <a href="to do.html">TO-DO list</a>
    <a href="notes_final.html">Notes</a>
    <a href="timer.html">Focus Session</a>
    <a href="#footer" class="right">Link</a>
</nav>

<div class="row">
    <div class="side">
        <h2 id="h">Launch Pad</h2>
        <h3>Vision:</h3>
        <img src="vision.jpg" alt="Vision Image" style="max-width: 100%; border-radius: 50px; align-items: center;">
        <h3>Dark academia</h3>
        <div class="quote-container">
            <h1><i class="fas fa-quote-left"></i> <span class="quote" id="quote"></span> <i class="fas fa-quote-right"></i></h1>
            <p class="author" id="author"></p>
            <div class="buttons">
                <a class="twitter" id="tweet" href="#" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter"></i></a>
                <button class="next" onclick="getNewQuote()">Next quote</button>
            </div>
        </div>
    </div>
    <div class="main">
        <h2>Journal</h2>
        <h3>First day of college.</h3>
        <div class="fakeimg" style="height:200px;">
            <h2>Highlights of the day:</h2>
            <ul id="highlightsList">
                <!-- Highlights will be added dynamically here -->
            </ul>
        </div>
        <p>Practicing journaling daily!!!</p>
        <button onclick="addHighlight()">Add Highlight</button>
    </div>
</div>

<footer id="footer">
    <div class="footer-container">
        <ul class="social-links">
            <li><a href="https://www.facebook.com/"><img src="fb.jpeg" alt="Facebook Icon"></a></li>
            <li><a href="https://twitter.com/"><img src="tw.png" alt="Twitter Icon"></a></li>
        </ul>
        <p>&copy; 2024 Atlanta</p>
    </div>
</footer>

<script>
    function addHighlight() {
        var highlight = prompt("Enter highlight of the day:");
        if (highlight) {
            var highlightsList = document.getElementById("highlightsList");
            var li = document.createElement("li");
            li.textContent = highlight;
            highlightsList.appendChild(li);
        }
    }

    const text = document.getElementById("quote");
    const author = document.getElementById("author");
    const tweetButton = document.getElementById("tweet");

    const getNewQuote = async () => {
        var url = "https://type.fit/api/quotes";
        const response = await fetch(url);
        const allQuotes = await response.json();
        const indx = Math.floor(Math.random() * allQuotes.length);
        const quote = allQuotes[indx].text;
        const auth = allQuotes[indx].author || "Anonymous";
        text.innerHTML = quote;
        author.innerHTML = "~ " + auth;
        tweetButton.href = "https://twitter.com/intent/tweet?text=" + encodeURIComponent('"' + quote + '" - ' + auth);
    }

    getNewQuote();
</script>

</body>
</html>
