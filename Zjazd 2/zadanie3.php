<!--
    Formularz rezerwacji hotelu - udoskonalony
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel Reservation Form</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <style>
        body {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: flex-start;
            background: linear-gradient(to right, #6a11cb 0%, #2575fc 100%);
            font-family: 'Arial', sans-serif;
            color: #fff;
        }
        .form-container, #reservation-summary, #additional_guests_summary {
            width: 30%;
            min-width: 300px;
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            color: #333;
        }
        .hidden {
            display: none;
        }
        input[type="text"], input[type="email"], input[type="date"], input[type="time"], select {
            width: calc(100% - 22px);
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            color: white;
            background-color: #4CAF50;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        label {
            font-weight: bold;
            color: #333;
        }
        .select2-container--default .select2-results__option {
            color: black;
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #cccccc;
        }

        .select2-container--default .select2-results__option[aria-selected=true] {
            background-color: #eaeaea;
        }
    </style>
</head>
<body>
    <div class="form-container" id="main-info">
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

            <label for="amenities">Click below to select amenities:</label><br><br>
            <select id="amenities" name="amenities[]" multiple="multiple" style="width: 100%">
                <option value="Air Conditioning">Air Conditioning</option>
                <option value="Ashtray">Ashtray for smokers</option>
                <option value="Wi-Fi">Wi-Fi</option>
                <option value="Parking">Parking Space</option>
            </select>

            <br><br>
            <div class="form-container hidden" id="additional_guests_info">
                <!-- Container for additional guest forms -->
            </div>

            <input type="submit" value="Submit Reservation">
        </form>
    </div>

    <div class="form-container hidden" id="reservation-summary">
        <?php
            // var_dump($_POST);
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

                echo "<h1>Reservation Summary</h1>";
                $masked_credit_card = str_repeat("X", 12) . substr($creditcard, -4);
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

                // Show summary and hide guest info forms via JavaScript after form submission
                echo "<script>
                        document.getElementById('additional_guests_info').classList.add('hidden');
                        document.getElementById('reservation-summary').classList.remove('hidden');
                    </script>"; 
            }
        ?>
    </div>

    <div class="form-container hidden" id="additional_guests_summary">
        <?php
            // var_dump($_POST);
            if ($_SERVER["REQUEST_METHOD"] == "POST" && $guests > 1) {
                echo "<script>document.getElementById('additional_guests_summary').classList.remove('hidden');</script>";
                echo "<h2>Additional Guests Information:</h2>";
                for ($i = 1; $i < $guests; $i++) {
                    if (isset($_POST["guest_firstname_$i"], $_POST["guest_lastname_$i"])) {
                        $guest_firstname = htmlspecialchars($_POST["guest_firstname_$i"]);
                        $guest_lastname = htmlspecialchars($_POST["guest_lastname_$i"]);
                        echo "<p>Guest " . ($i + 1) . ": $guest_firstname $guest_lastname</p>";
                    }
                }
            }
        ?>
    </div>

    <script>
        document.getElementById('guests').addEventListener('change', function() {
            const numberOfGuests = this.value;
            const container = document.getElementById('additional_guests_info');
            container.innerHTML = ''; // Clear previous entries
            if (numberOfGuests > 1) {
                container.classList.remove('hidden');
                for (let i = 1; i < numberOfGuests; i++) {
                    container.innerHTML += `
                        <div class="guest-info">
                            <h3>Guest ${i + 1} Information</h3>
                            <label for="guest_firstname_${i}">First Name:</label>
                            <input type="text" id="guest_firstname_${i}" name="guest_firstname_${i}" required><br><br>
                            <label for="guest_lastname_${i}">Last Name:</label>
                            <input type="text" id="guest_lastname_${i}" name="guest_lastname_${i}" required><br><br>
                        </div>
                    `;
                }
            } else {
                container.classList.add('hidden');
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#amenities').select2({
                placeholder: "Select amenities",
                allowClear: true
            });
        });
    </script>
</body>
</html>
