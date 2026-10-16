<h1>Liste des étudiants</h1>
<?php foreach ($students as $student): ?>
  <ul>

    <li>
      <?= $student['name'] ?> (<?= $student['age'] ?> ans)
    </li>
  </ul>
<?php endforeach; ?>