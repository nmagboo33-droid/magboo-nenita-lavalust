<!DOCTYPE html>

<html>
<head>
    <title>User List</title>

```
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f1f5f9;
        margin: 0;
        padding: 40px;
    }

    .container {
        max-width: 1000px;
        margin: 0 auto;
        background-color: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    }

    .header {
        margin-bottom: 25px;
    }

    .header h1 {
        margin: 0;
        color: #1e3a8a;
        font-size: 30px;
    }

    .header p {
        color: #64748b;
        margin-top: 8px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        overflow: hidden;
        border-radius: 8px;
    }

    th {
        background-color: #1e3a8a;
        color: white;
        padding: 14px;
        text-align: left;
    }

    td {
        padding: 13px 14px;
        border-bottom: 1px solid #e2e8f0;
        color: #334155;
    }

    tr:hover {
        background-color: #eff6ff;
    }

    .id {
        font-weight: bold;
        color: #1e3a8a;
    }

    .username {
        font-weight: bold;
        color: #2563eb;
    }

    .footer {
        margin-top: 20px;
        text-align: center;
        color: #94a3b8;
        font-size: 13px;
    }
</style>
```

</head>

<body>

```
<div class="container">

    <div class="header">
        <h1>User List</h1>
        <p>Registered users in the system</p>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Username</th>
        </tr>

        <?php foreach ($users as $user): ?>
            <tr>
                <td class="id"><?= $user['id']; ?></td>
                <td><?= $user['firstname']; ?></td>
                <td><?= $user['lastname']; ?></td>
                <td><?= $user['email']; ?></td>
                <td class="username"><?= $user['username']; ?></td>
            </tr>
        <?php endforeach; ?>

    </table>

    <div class="footer">
        LavaLust User Management System
    </div>

</div>
```

</body>
</html>
