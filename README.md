# Design-and-Implementation-of-an-NUB-Online-Exam-System

## Overview
The **NUB Online Exam System** is a web-based platform designed to facilitate the management and administration of online exams for Northern University Bangladesh (NUB). It offers a secure, scalable, and user-friendly interface for both instructors and students, supporting various question formats and providing automated grading and real-time feedback.

book pdf link: [https://drive.google.com/file/d/1hFEv329AebtLVlpdFeKygY58vT98zCoe/view?usp=drive_link](https://drive.google.com/file/d/1hFEv329AebtLVlpdFeKygY58vT98zCoe/view?usp=drive_link)

## Features
- **User Authentication**: Secure login system for students and instructors.
- **Quiz Management**: Instructors can create, edit, and manage quizzes with different question types.
- **Automated Grading**: Automatic evaluation of quiz responses, with real-time scoring.
- **Real-Time Feedback**: Students receive immediate results upon quiz submission.
- **Question Bank**: Instructors can upload and manage a variety of question formats (MCQs, PDFs, images, etc.).
- **Course Management**: Instructors can add and manage courses.
- **Responsive Design**: The platform is accessible on both desktop and mobile devices.
- **Scalability**: Designed to handle multiple users simultaneously with performance optimization.

## Technologies Used
- **Backend**: PHP
- **Database**: MySQL (prolearner.sql)
- **Frontend**: HTML, CSS, JavaScript
- **Libraries**:
  - jQuery
  - Bootstrap
  - SweetAlert (for alerts)
  - Dropzone (for file uploads)
  - FullCalendar (for scheduling)

## Installation

### Prerequisites
Ensure you have the following installed on your local machine or server:
- PHP (7.4+)
- MySQL or MariaDB
- Apache or Nginx web server

### Steps to Setup
1. **Clone the Repository**:
    ```bash
    git clone https://github.com/your-repo/Design-and-Implementation-of-an-NUB-Online-Exam-System.git
    ```
2. **Navigate to the Project Directory**:
    ```bash
    cd Design-and-Implementation-of-an-NUB-Online-Exam-System
    ```
3. **Set Up the Database**:
    - Import the `prolearner.sql` file into your MySQL database.
    ```bash
    mysql -u username -p database_name < prolearner.sql
    ```
    - Update the `api/config.php` file with your database credentials.
    
4. **Start the Server**:
    - If using Apache, move the project to the Apache root directory and run:
    ```bash
    sudo service apache2 restart
    ```
    - If using a built-in PHP server:
    ```bash
    php -S localhost:8000
    ```

5. **Access the Application**:
    - Visit `http://localhost:8000` in your browser.

## Usage

### For Instructors
- Log in using your credentials.
- Create or manage courses and quizzes.
- View student performance in real-time.

### For Students
- Log in and view available quizzes.
- Attempt quizzes and receive instant feedback upon submission.

## Folder Structure
- **`index.php`**: Main entry point of the web application.
- **`api/`**: Contains all the PHP scripts related to course management, quiz creation, and user actions.
- **`assets/`**: Includes all CSS, JS, and image files used in the front-end.
- **`uploads/`**: Stores all uploaded files such as profile images, course materials, and exam questions.
- **`prolearner.sql`**: The SQL dump file for setting up the database.

## Screenshots

![1_home_page](https://github.com/user-attachments/assets/65577457-1ce7-4821-9d32-1daa3f557d13)
![2_login_sign_up](https://github.com/user-attachments/assets/495f1abd-20d3-4641-a414-a60f59adbc35)
![3_sign_up_page_teacher](https://github.com/user-attachments/assets/ced385e1-9b2a-4441-9fb4-38e7806fdbb4)
![4_teacher_profile](https://github.com/user-attachments/assets/dd67bd9c-2149-4954-9793-632914f28363)
![5_teacher_edit_account](https://github.com/user-attachments/assets/ab1480be-35f7-407e-af50-e3eb61f4fff1)
![6_add_courses](https://github.com/user-attachments/assets/225563f9-1c32-4a93-9ccd-29b7d2774149)
![7_annoucement](https://github.com/user-attachments/assets/f5813f07-534e-42a5-aa78-97ed98541f7b)
![8_exam_title_and_schedule_manage](https://github.com/user-attachments/assets/dbeafaaf-fb57-4b49-b7cd-7427b6be5f3a)
![9_written_question-set](https://github.com/user-attachments/assets/c44947ce-995f-49ac-9e25-b249c70d9422)
![10_mcq-set](https://github.com/user-attachments/assets/7edf40f2-0421-4d04-93a4-b6143ea00a60)
![11_exam_managmnet_dashboard](https://github.com/user-attachments/assets/70e827d1-a133-4163-8641-70bb7aaef66b)
![12_exam-url-key](https://github.com/user-attachments/assets/78a256a4-a0c1-4a75-801e-c848bc2f5f49)
![13_student_account_reistration](https://github.com/user-attachments/assets/2f6d2203-5b6b-4110-9bd9-e54911905c8a)
![15-exam-dashbord-student](https://github.com/user-attachments/assets/5f96ad46-7601-4c18-a8e0-ffbf6772a904)
![16-enrollment-key-here](https://github.com/user-attachments/assets/b1e306d5-6d0b-452b-b718-214dfb67ff5e)
![17_attempt-page](https://github.com/user-attachments/assets/16f0e801-b07a-40a7-91d5-28b291551989)
![18_exam_hall_digital](https://github.com/user-attachments/assets/cda08b8a-46ca-49c4-96a4-a1febec4a161)
![23_after given exam mark of student](https://github.com/user-attachments/assets/5473933a-a2a6-4238-a51b-cb92519179d0)

## Contributing
Contributions are welcome! If you would like to contribute to this project:
1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Commit your changes (`git commit -m 'Add some feature'`).
4. Push to the branch (`git push origin feature-branch`).
5. Open a pull request.

## License
This project is licensed under the MIT License.

## Authors

- [@abutalha](https://github.com/md-abutalha)


## 🔗 Links
[![portfolio](https://img.shields.io/badge/my_portfolio-000?style=for-the-badge&logo=ko-fi&logoColor=white)](https://github.com/md-abutalha)
[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/abu-talha1/)
[![twitter](https://img.shields.io/badge/twitter-1DA1F2?style=for-the-badge&logo=twitter&logoColor=white)](https://x.com/abu_talha0x)

