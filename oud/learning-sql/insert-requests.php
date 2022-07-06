<?php
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "eventory";


function esc($word)
{
	return addslashes($word);
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{

    $firstname = trim($_POST['voornaam']);
    $firstname = esc($firstname);
    $lastname = trim($_POST['achternaam']);
    $lastname = esc($fullname);
    $studentnummer = $_POST['studentennummer'];
    $email = $_POST['email'];
    $mobielenummer = $_POST['mobielenummer'];
    $niveau = $_POST['niveau'];
    $event = $_POST['event'];
    $positie = $_POST['positie'];
    
    
    try {

    $conn = new PDO("mysql:host=$dbservername;dbname=$dbname", $dbusername, $dbpassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO `sollicitanties ` (voornaam,achternaam,studentnummer,email,mobielenummer,niveau,event,positie) 
    VALUES ('$firstname', '$lastname', '$studentnummer', '$email', '$mobielenummer', '$niveau', '$event', '$positie')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Je sollicitatie is verzonden!";
    } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}
?> 
<html>
<head>
<title>Eventory registratie formulier</title>
<link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
  <div class="container">
    <div class="Header">
      <div class="part1">
      <img src="assets/img/Rocmn.png" />
        Creative <br /> College
        </div>

      <div class="part2">
      <img src="assets/img/jam.JPG" />
    </div>

    </div>
    <div class="Main">

<h3>Eventory inschrijf formulier</h3>


<table align="center" cellpadding = "10">

<!----- First Name ---------------------------------------------------------->
<tr>
<td>Voornaam</td>
<td><input type="text" name="First_Name" maxlength="30"/>
(Maximaal 30 letters)
</td>
</tr>

<!----- Last Name ---------------------------------------------------------->
<tr>
<td>Achternaam</td>
<td><input type="text" name="Last_Name" maxlength="30"/>
(Maximaal 30 letters)
</td>
</tr>

<!----- Date Of Birth -------------------------------------------------------->
<tr>
<td>Geboortedatum</td>

<td>
<select name="Birthday_day" id="Birthday_Day">
<option value="-1">Dag:</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>

<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>

<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>

<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>

<option value="31">31</option>
</select>

<select id="Birthday_Month" name="Birthday_Month">
<option value="-1">Maand:</option>
<option value="January">Jan</option>
<option value="February">Feb</option>
<option value="March">Mar</option>
<option value="April">Apr</option>
<option value="May">May</option>
<option value="June">Jun</option>
<option value="July">Jul</option>
<option value="August">Aug</option>
<option value="September">Sep</option>
<option value="October">Oct</option>
<option value="November">Nov</option>
<option value="December">Dec</option>
</select>

<select name="Birthday_Year" id="Birthday_Year">

<option value="-1">Jaar:</option>
<option value="2012">2012</option>
<option value="2011">2011</option>
<option value="2010">2010</option>
<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>

<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>

<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
</select>
</td>
</tr>

<!-- studentnummer -->
<tr>
<td>Studentnummer</td>
<td><input type="text" name="studentnunmmer" maxlength="6" />
(6 cijfers)
</td>
</tr>

<!----- Email Id ---------------------------------------------------------->
<tr>
<td>Email adres</td>
<td><input type="text" name="email" maxlength="100" /></td>
</tr>

<!----- Mobile Number ---------------------------------------------------------->
<tr>
<td>Mobiele nummer</td>
<td>
<input type="text" name="telefoon" maxlength="10" />
(10 cijferig nummer)
</td>
</tr>

<!----- Gender ----------------------------------------------------------->
<tr>
<td>Geslacht</td>
<td>
Man <input type="radio" name="Gender" value="Male" />
Vrouw <input type="radio" name="Gender" value="Female" />
Zeg ik liever niet<input type="radio" name="Gender" value="onzijdig" />
</td>
</tr>

<!----- Address ---------------------------------------------------------->
<tr>
<td>Adres <br /><br /><br /></td>
<td><textarea name="Address" rows="4" cols="30"></textarea></td>
</tr>

<!----- City ---------------------------------------------------------->
<tr>
<td>Provincie</td>
<td><input type="text" name="City" maxlength="30" />
(Maximaal 30 letters)
</td>
</tr>


<!----- State ---------------------------------------------------------->
<tr>
<td>Stad / Dorp</td>
<td><input type="text" name="State" maxlength="30" />
(Maximaal 30 letters)
</td>
</tr>


<!----- Hobbies ---------------------------------------------------------->
<tr>
<td>Wat is je Niveau?</td>
<td>
Niveau 1
<input type="radio" name="niveau_1" value="1" />
Niveau 2
<input type="radio" name="niveau_2" value="2" />
Niveau 3
<input type="radio" name="niveau_3" value="3" />
Niveau 4
<input type="radio" name="niveau_4" value="4" />
</br>
</td>
</tr>

<tr>
<td>Welk Evenement kies je?<br /><br /><br /></td>

<td>
Muziek evenement
<input type="checkbox" name="muziek evenement" value="muziek" />
Cabaret
<input type="checkbox" name="cabaret" value="cabaret" />
Toneel
<input type="checkbox" name="toneel" value="toneel" />
</br>
Kunst
<input type="checkbox" name="kunst" value="kunst" />
Open avonden
<input type="checkbox" name="Open avonden" value="Cooking" />
Sportdag
<input type="checkbox" name="Sportdag" value="Cooking" />
</br>
Introductie weken
<input type="checkbox" name="Introductie weken" value="Cooking" />
Orientatie workshops
<input type="checkbox" name="Orientatie workshops" value="Cooking" />
</br>
Schoolfeest
<input type="checkbox" name="Schoolfeest" value="Cooking" />

</td>
</tr>

<tr>
<td>Evenement locatie<br /><br /><br /></td>

<td>
Zuid-Holland
<input type="checkbox" name="Zuid-Holland" value="Drawing" />
Noord-Holland
<input type="checkbox" name="Noord-Holland" value="Singing" />
Zeeland
<input type="checkbox" name="Zeeland" value="Dancing" />
</br>
Groningen
<input type="checkbox" name="Groningen" value="Cooking" />
Drenthe
<input type="checkbox" name="Drenthe" value="Cooking" />
Friesland
<input type="checkbox" name="Friesland" value="Cooking" />
</br>
Overijssel
<input type="checkbox" name="Overijssel" value="Cooking" />
Utrecht
<input type="checkbox" name="Utrecht" value="Cooking" />
Flevoland
<input type="checkbox" name="Flevoland" value="Cooking" />
</br>
Gelderland
<input type="checkbox" name="Gelderland" value="Cooking" />
Noord-Brabant
<input type="checkbox" name="Noord-Brabant" value="Cooking" />
Limburg
<input type="checkbox" name="Limburg" value="Cooking" />

</td>
</tr>

<!----- Qualification---------------------------------------------------------->
<td>Positie<br /><br /><br /></td>

<td>
Organisator
<input type="checkbox" name="organisator" value="Drawing" />
Leidinggevende
<input type="checkbox" name="leidinggevende" value="Singing" />
Medewerker
<input type="checkbox" name="medewerker" value="Dancing" />
</br>
Opbouwer
<input type="checkbox" name="opbouwer" value="Cooking" />
Afbreker
<input type="checkbox" name="afbreker" value="Cooking" />
Kassiere
<input type="checkbox" name="kassiere" value="Cooking" />
Beveiliger
<input type="checkbox" name="beveiliger" value="Cooking" />
</br>
Marketing
<input type="checkbox" name="marketing" value="Cooking" />
Planner
<input type="checkbox" name="planner" value="Cooking" />
Catering
<input type="checkbox" name="catering" value="Cooking" />


<!----- Submit and Reset ------------------------------------------------->
<tr>
<td colspan="2" align="center">
<input type="submit" value="Insturen">

</td>
</tr>
</table>

</form>

<div class="Footer">
  <img src="assets/img/Knipsel.png" />
</div></div></div>
</body>
</html>
