// Simulated database of credentials
var credentials = {
    students: [
        {
            username: "student1",
            password: "student123",
            name: "John Doe",
            email: "john@student.com",
            role: "student"
        },
        {
            username: "student2",
            password: "pass123",
            name: "Jane Smith",
            email: "jane@student.com",
            role: "student"
        }
        // Add more student objects if needed
    ],
    teachers: [
        {
            username: "teacher1",
            password: "teacher123",
            name: "Mr. Smith",
            email: "smith@teacher.com",
            role: "teacher"
        },
        {
            username: "teacher2",
            password: "pass456",
            name: "Ms. Johnson",
            email: "johnson@teacher.com",
            role: "teacher"
        }
        // Add more teacher objects if needed
    ]
};

// Function to handle student login
function studentLogin(username, password) {
    setTimeout(function() {
        // Check if the entered credentials match
        var student = credentials.students.find(function(student) {
            return student.username === username && student.password === password;
        });
        if (student) {
            // Redirect to homepage.html
            window.location.href = 'homepage.html';
        } else {
            alert('Invalid username or password for student.');
        }
    }, 1000); // Simulate network delay
}

// Function to handle teacher login
function teacherLogin(username, password) {
    setTimeout(function() {
        // Check if the entered credentials match
        var teacher = credentials.teachers.find(function(teacher) {
            return teacher.username === username && teacher.password === password;
        });
        if (teacher) {
            // Redirect to tc.html
            window.location.href = 'tc.html';
        } else {
            alert('Invalid username or password for teacher.');
        }
    }, 1000); // Simulate network delay
}
