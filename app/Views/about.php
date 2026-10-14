<?= view('templates/header', ['title' => 'About Project']); ?>

<div class="pos-card">
    <div class="pos-card-header">
        <h2 class="pos-card-title">About This Application</h2>
        <span class="badge-role">Academic Project — TFA3</span>
    </div>

    <div style="line-height: 1.7; color: #444;">
        <p>
            This Point of Sale (POS) administrative interface was developed as part of the <strong>TFA3 Assessment</strong> for Web System Technologies.
        </p>

        <h3 style="color: #2c3e50; margin-top: 20px;">Technical Stack</h3>
        <ul style="padding-left: 20px;">
            <li><strong>Framework:</strong> CodeIgniter 4 (PHP)</li>
            <li><strong>Database:</strong> MySQL / MariaDB (`tfa3`) via MAMP</li>
            <li><strong>Architecture:</strong> Model-View-Controller (MVC) Pattern</li>
            <li><strong>Styling:</strong> Custom POS Interface with Bootstrap 5 components</li>
        </ul>

        <h3 style="color: #2c3e50; margin-top: 20px;">Key Features & Implementation</h3>
        <ul style="padding-left: 20px;">
            <li><strong>Full CRUD Operations:</strong> Complete Create, Read, Update, and Delete capabilities for both Customer and User Management modules.</li>
            <li><strong>File Handling & Uploads:</strong> Secure avatar image uploading, validation, and storage integrated directly into the user account lifecycle.</li>
            <li><strong>Database Integrity:</strong> Structured schema alignment featuring hashed user passwords, email verification rules, and robust form validation.</li>
            <li><strong>Modular Layouts:</strong> Reusable header, footer, and navigation templates ensuring seamless routing across the administrative dashboard.</li>
        </ul>
    </div>
</div>

<?= view('templates/footer'); ?>