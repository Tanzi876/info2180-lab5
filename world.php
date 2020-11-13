<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$country= $_GET['country'];
$context= $_GET['context'];
if($context == 'cities' ){
  $stmt=$conn->query("SELECT countries.name as cities.name, cities.district, cities.population FROM countries 
  JOIN cities on countries.code = cities.country_code Where countries.name LIKE '%$country%'");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);  
}else{
  $stmt=$conn->query("SELECT * FROM countries Where name LIKE '%$country%");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);  
}

?>
<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>

<?php if($context=='country'):?>
  <table>
    <thead>
      <th> Name</th>
      <th>Continent</th>
      <th>Independence</th>
      <th>Head of State</th>
    </thead>
    <tbody>
      <?php foreach($result as $row): ?>
        <tr>
          <td> <?=$row['name']?></td>
          <td> <?=$row['continent']?></td>
          <td> <?=$row['independence_year']?></td>
          <td> <?=$row['head_of_state']?></td>
      </tr>
      <?php endforeach;?>
      </tbody>
  </table>
<?php else : ?>
        <table>
          <thead>
            <th> Name</th>
            <th>District</th>
            <th>Population</th>
          </thead>
          <tbody>
            <?php foreach($result as $row): ?>
              <tr>
                <td> <?=$row['name']?></td>
                <td> <?=$row['district']?></td>
                <td> <?=$row['population']?></td>
              </tr>
            <?php endforeach;?>
            </tbody>
        </table>
<?php endif;?>