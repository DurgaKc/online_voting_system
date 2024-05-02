function changeTab(tabName) {
    // Hide all tabs
    document.getElementById('dashboardTab').style.display = 'none';
    document.getElementById('userListTab').style.display = 'none';
    document.getElementById('addUserTab').style.display = 'none';

    // Show the selected tab
    document.getElementById(tabName + 'Tab').style.display = 'block';

    if (tabName === 'userList') {
        // Simulate fetching user data and updating the list
        fetchUserList();
    }
}

function fetchUserList() {
    // Simulated user data
    const users = [
        { id: 1, username: 'user1', email: 'user1@example.com' },
        { id: 2, username: 'user2', email: 'user2@example.com' },
        { id: 3, username: 'user3', email: 'user3@example.com' }
    ];

    // Display user list
    const userListElement = document.getElementById('userList');
    userListElement.innerHTML = '';

    users.forEach(user => {
        const listItem = document.createElement('li');
        listItem.textContent = `${user.username} - ${user.email}`;
        userListElement.appendChild(listItem);
    });
}

function addUser() {
    // Simulate adding a user (you can implement AJAX request here)
    const username = document.getElementById('username').value;
    const email = document.getElementById('email').value;

    // Display success message (you can handle errors as well)
    alert(`User added successfully:\nUsername: ${username}\nEmail: ${email}`);

    // Clear the form
    document.getElementById('addUserForm').reset();
}
