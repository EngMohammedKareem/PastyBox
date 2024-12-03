# **PastyBox: The Ultimate Code Snippet Sharing Platform**

Welcome to **PastyBox** – a seamless and secure platform designed for developers, coders, and creatives to easily store, share, and manage their code snippets. Whether you're a beginner or a seasoned coder, PastyBox is here to simplify your workflow and help you get your code out there with a breeze.

Built with the power of **Laravel**, **TailwindCSS**, and a sprinkle of love for the developer community, PastyBox is your new best friend for sharing code. Let’s get this thing up and running in no time!

![image](https://github.com/user-attachments/assets/a7d79f98-9901-408a-a349-f830b1ba71ea)

---

## 🔥 **Key Features**

-   **Create & Share Snippets**: Store your code snippet INSTANTLY by double clicking the code block !
-   **Syntax Highlighting**: View your code in all its glory with syntax highlighting (because you deserve to see it in color).
-   **Private & Secure**: Your code, your rules. Enjoy peace of mind knowing that your snippets are safe with us.
-   **Simple & Fast**: Quick creation and intuitive UI, so you can focus on what really matters – your code.
-   **Responsive Design**: Works smoothly on any device, whether you're on desktop, tablet, or mobile.

---

## 🚀 **Getting Started**

Ready to dive in? Here's how to get **PastyBox** running locally on your machine:

### 1. **Clone the Repository**

Open up that terminal and clone the repo to your local machine:

```bash
git clone https://github.com/EngMohammedKareem/pastybox.git
cd pastybox
```

### 2. **Install Dependencies**

Once inside your project directory, install all the required dependencies using **Composer** and **NPM**:

```bash
# Install PHP dependencies
composer install

# Install front-end dependencies
npm install
```

### 3. **Set Up the Environment**

Copy the example environment file and configure your database:

```bash
cp .env.example .env
```

Open the `.env` file and update your database connection. For SQLite (the default):

```env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

Make sure the database directory exists and is writable:

```bash
mkdir -p database
touch database/database.sqlite
```

### 4. **Run Migrations & Seeders**

Run the database migrations to set up your tables, and optionally seed the database with some test data:

```bash
php artisan migrate --seed
```

### 5. **Start the Development Server**

Once everything’s set up, launch the local development server:

```bash
php artisan serve
```

You can now access **PastyBox** by going to [http://127.0.0.1:8000](http://127.0.0.1:8000) in your browser.

---

## 🎨 **Tech Stack**

-   **Laravel** (Backend Framework): A powerful PHP framework that makes backend development faster and more enjoyable.
-   **TailwindCSS** (Styling): The utility-first CSS framework for rapidly building custom designs without breaking a sweat.
-   **SQLite** (Database): A lightweight, serverless database engine for fast and easy development.
-   **JavaScript** (Frontend): Used to enhance user interactions (like the smooth code-copying feature).

---

## 🔑 **Authentication & Authorization**

Only authenticated users can post their code snippets! 🚀

### **Gates & Middleware**:

-   The app uses **Laravel’s `auth` middleware** to restrict access to pasty creation, editing, and deletion.
-   Users must be logged in to create or modify pasties.

### **Authorization for Actions**:

We also use **Gates** to ensure that users can only perform actions on their own pasties. If you're trying to mess with someone else's code, well... better luck next time. 😏

---

## 💡 **Future Improvements**

Here’s a sneak peek at some ideas for where **PastyBox** could go next:

-   **User Profiles**: Give users the ability to manage their own profiles and track their pasties.
-   **Public/Private Snippets**: Add options for users to mark snippets as private or public, controlling who can view them.
-   **Code Versioning**: Support version control for snippets to track changes over time.
-   **Theming**: Dark mode, baby! (It’s time to make it official). 🎨🖤
-   **Snippets Search**: Improve discoverability with a powerful search feature for all public pasties.

---

## 📝 **Contributing**

Contributions are welcome! If you’ve got ideas to make **PastyBox** even better, feel free to fork the repo, make your changes, and submit a pull request. If you spot bugs or want to add new features, open an issue and let's work together to make this project even more amazing.

1. Fork the repo
2. Create your feature branch (`git checkout -b feature-name`)
3. Commit your changes (`git commit -am 'Add new feature'`)
4. Push to the branch (`git push origin feature-name`)
5. Open a pull request

---

## 📜 **License**

PastyBox is open-source and available under the [MIT License](LICENSE).

---

## 📞 **Contact**

Have questions or need help? Hit me up:

-   **Email**: devdotpy@gmail.com
-   **Twitter**: [@TechBroWannabe](https://twitter.com/techbrowannabe)

---

### 🌟 **Thank You for Using PastyBox!** 🌟

I'm excited to have you on board as part of the **PastyBox** community. Don’t forget to share your favorite pasties with your friends (and let’s make code sharing cool again).

---
