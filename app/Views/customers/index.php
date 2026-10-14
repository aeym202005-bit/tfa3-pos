<?= view('templates/header', ['title' => 'Customer Management']); ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Customers List</h2>
        <a href="<?= site_url('/customers/new') ?>" class="btn btn-primary">Add New Customer</a>
    </div>

    <?php if (session()->has('success')): ?>
        <div class="alert alert-success"><?= session('success') ?></div>
    <?php endif; ?>

    <?php if (session()->has('error')): ?>
        <div class="alert alert-danger"><?= session('error') ?></div>
    <?php endif; ?>

    <table class="pos-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th style="text-align: center;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($customers) && is_array($customers)): ?>
                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td><?= esc($customer['id']) ?></td>
                        <td><?= esc($customer['full_name']) ?></td>
                        <td><?= esc($customer['email']) ?></td>
                        <td><?= esc($customer['phone']) ?></td>
                        <td style="text-align: center;">
                            <a href="<?= site_url('/customers/edit/' . $customer['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                            <form action="<?= site_url('/customers/delete/' . $customer['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this customer?');">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">No customers found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= view('templates/footer'); ?>