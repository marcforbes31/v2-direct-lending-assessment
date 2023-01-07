# v2-direct-lending-assessment
Created using PHP, HTML, Bootstrap CSS, JavaScript, and JQuery AJAX

<h1>Instructions to Run Code</h1>
<ul>
<li>A Web Server such as XAMPP is needed to run the PHP files</li>
<li>Once XAMPP is downloaded, this file can be pasted into the htdocs file most commonly found in C:/xampp/</li>
<li>Next, launch the XAMPP Control Panel</li>
<li>Press Start and Admin on the Apache row in the XAMPP Control Panel</li>
<li>Press Start and Admin on the MySQL row in the XAMPP Control Panel</li>
<li>Once in PHPMyAdmin MySQL, create a database named 'directlending'</li>
<li>Next, import the SQL File that can be found in the database file located in this project</li>
<li>After all that, all that's left to do is open a browser and type in localhost/[the name of this project file found on your computer]</li>

</ul>
<hr>
<h1>Code Run Through</h1>
<br>
<ul>
<li>The HTML Form is found inside the index.html file along with the AJAX code</li>
<li>There is a getState.js file which contains a JavaScript function that fetches the State and its ID from the single_state.php file, which is an API that returns the state information based on the parameter 'postcode' (URL Example: http://localhost/direct-lending/api/v1/single_state.php?postcode=35000). To put it simply, whenever a user enters the postcode, the function will be called and will get the State from the API, based on the user's input.</li>
<li>When a user fills in the form and submits, all the inputs are passed to an AJAX Post Request Method and sends all the form data to the create.php file, which is the API to store a customer into the database</li>
<li>There is also a customer.php API which returns all the Customers with their Name, Age, Address, Postcode, and State as the attributes</li>
</ul>
<hr>
<h1>Assumptions Made</h1>
<h4>Requirement #6 (Query the submitted data with the following columns: Name, Age, Address, Postcode, State)</h4>
<ul>
<li>Based on the requirement above, I personally was not too sure what it exactly meant. Therefore, based on my understanding of that requirement, I just made the index.html file show the Customers in the database in table form. I achieved this using an AJAX GET Request Method to get all the customers from the customer.php API. Additionally, whenever a user successfully saves the information of a Customer, the newly created customer will be added to the table</li>
</ul>
<hr>
<h1>SQL Queries for Customer</h1>
<ul>
<li>To calculate the age of a Customer, I used the SQL Functions DATE_FORMAT(), FROM_DAYS(), DATE_DIFF(), NOW()</li>
<li>Combined together to this : DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), dob)), '%Y') + 0 </li>
<li>Based on my understanding, the DATE_FORMAT is used to specify the format of the calculation, in this case its in Years therefore '%Y'</li>
<li>DATEDIFF(x,y) finds the difference in the number of days between x and y, in this case x is NOW() which is the current date and y is the Customer's date of birth</li>
<li>FROM_DAYS() finds the specific date based on the number of days</li>
<li>The + 0 at the end is to eliminate the unnecessary 0s when displaying the year (Example: 0032 + 0 = 32)</li>
<li>I used INNER JOIN to join the customers table and the postcode table, so it would fetch the customer information, as well as the postcode and state based on the postcode_id foreign key found in the Customer table</li>
<li>SQL Query: SELECT name,DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), dob)), '%Y') + 0 AS age,address,postcode,state FROM customer INNER JOIN postcode ON customer.postcode_id = postcode.id</li>
</ul>
