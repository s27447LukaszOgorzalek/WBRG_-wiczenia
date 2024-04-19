<!--
    Formularz rezerwacji hotelu
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel Reservation Form</title>
</head>
<body>
    <h1>Hotel Reservation Form</h1>
    <form method="post">
        <label for="guests">Number of guests:</label>
        <select id="guests" name="guests" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select><br><br>

        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" required><br><br>

        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br><br>

        <label for="creditcard">Credit Card Number:</label>
        <input type="text" id="creditcard" name="creditcard" pattern="\d{16}" title="Credit card number must be 16 digits" required><br><br>

        <label for="checkin_date">Check-in Date:</label>
        <input type="date" id="checkin_date" name="checkin_date" required><br><br>

        <label for="checkout_date">Check-out Date:</label>
        <input type="date" id="checkout_date" name="checkout_date" required><br><br>

        <label for="checkin_time">Check-in Time:</label>
        <input type="time" id="checkin_time" name="checkin_time" required><br><br>

        <label for="checkout_time">Check-out Time:</label>
        <select id="checkout_time" name="checkout_time">
            <option value="09:00">09:00</option>
            <option value="10:00">10:00</option>
            <option value="11:00">11:00</option>
            <option value="12:00">12:00</option>
            <option value="13:00">13:00</option>
        </select><br><br>

        <label for="extra_bed">Extra bed for a child:</label>
        <input type="checkbox" id="extra_bed" name="extra_bed"><br><br>

        <label for="amenities">Select amenities:</label>
        <select id="amenities" name="amenities[]" multiple>
            <option value="Air Conditioning">Air Conditioning</option>
            <option value="Ashtray">Ashtray for smokers</option>
            <option value="Wi-Fi">Wi-Fi</option>
            <option value="Parking">Parking Space</option>
        </select><br><br>

        <input type="submit" value="Submit Reservation">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $guests = htmlspecialchars($_POST['guests']);
        $firstname = htmlspecialchars($_POST['firstname']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $email = htmlspecialchars($_POST['email']);
        $address = htmlspecialchars($_POST['address']);
        $creditcard = htmlspecialchars($_POST['creditcard']);
        $checkin_date = htmlspecialchars($_POST['checkin_date']);
        $checkout_date = htmlspecialchars($_POST['checkout_date']);
        $checkin_time = htmlspecialchars($_POST['checkin_time']);
        $checkout_time = htmlspecialchars($_POST['checkout_time']);
        $extra_bed = isset($_POST['extra_bed']) ? "Yes" : "No";
        $amenities = isset($_POST['amenities']) ? implode(", ", $_POST['amenities']) : "None";

        // Display only last four digits of the credit card
        $masked_credit_card = str_repeat("X", 12) . substr($creditcard, -4);

        echo "<h1>Reservation Summary</h1>";
        echo "<p>Name: $firstname $lastname</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Address: $address</p>";
        echo "<p>Credit Card Number: $masked_credit_card</p>";
        echo "<p>Number of Guests: $guests</p>";
        echo "<p>Check-in Date: $checkin_date</p>";
        echo "<p>Check-out Date: $checkout_date</p>";
        echo "<p>Check-in Time: $checkin_time</p>";
        echo "<p>Check-out Time: $checkout_time</p>";
        echo "<p>Extra Bed for Child: $extra_bed</p>";
        echo "<p>Selected Amenities: $amenities</p>";
    }
    ?>
</body>
</html>
