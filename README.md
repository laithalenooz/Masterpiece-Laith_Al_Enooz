<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->
[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
[![LinkedIn][linkedin-shield]][linkedin-url]



<!-- PROJECT LOGO -->
<br />
<p align="center">
  <a href="https://github.com/laithalenooz/Masterpiece-Laith_Al_Enooz">
    <img src="images/logo.png" alt="Logo" width="201" height="52">
  </a>

  <h3 align="center">Doccure</h3>

  <p align="center">
    An awesome README template to jumpstart your projects!
    <br />
    <a href="https://github.com/laithalenooz/Masterpiece-Laith_Al_Enooz"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="masterpiece.laith-alenooz.tech">View Demo</a>
    ·
    <a href="https://github.com/laithalenooz/Masterpiece-Laith_Al_Enooz/issues">Report Bug</a>
    ·
    <a href="https://github.com/laithalenooz/Masterpiece-Laith_Al_Enooz/issues">Request Feature</a>
  </p>
</p>



<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#main-goal">Main Goal</a></li>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

[![Product Name Screen Shot][product-screenshot]](https://masterpiece.laith-alenooz.tech)

I came up with the idea after going through the Pandemic, it made the hospitals crowded due to not booking appointments or getting consults on their current health condition and so on. It came to my mind that I should build a platform to make it easy for the patients and doctors to communicate and schedule appointments based on the condition online, I started by building the structure and figuring out which functionalities I need to make it a complete product.

Here's why:
* A website made for scheduling appointments with Clinics, Doctors and Hospitals
* It was made and built by one developer from scratch
* The website has three types of users ("Admin", "Clinic/Doctor", "Patient")
* The Admin is the one who controls everything in the website, starting from users all the way to sensitive users details
* Clinic/ Doctor, those are the ones who will register through our websites and getting approved by the admins to share their expertise and services with patients
* <details open>
	<summary>Patients:</summary>
	<br>
	<ul wfd-id="159">
	    <li wfd-id="168">New patients can easily register</li>
	    <li wfd-id="167">Simple Login and Register</li>
	    <li wfd-id="166">Select the clinic services based on the categories</li>
	    <li wfd-id="165">Select the city through keyword for view the nearest clinic</li>
	    <li wfd-id="164">View all the nearest clinics</li>
	    <li wfd-id="163">View the detailed information about the clinic, doctor and images</li>
	    <li wfd-id="162">Check the availability and cost</li>
	    <li wfd-id="161">Provide ratings and comments</li>
	    <li wfd-id="160">Make the simple appointment process</li>
	</ul>
</details>

### Main Goal
Create a safe environment by giving others the ability to schedule everything online without the need of going to a doctor or clinic and make the place crowded, by doing this it will lowers everyone's chance of getting infected by COVID-19 or any other disease.

### Built With

This section should list any major frameworks that you built your project using. Leave any add-ons/plugins for the acknowledgements section. Here are a few examples.
# Frontend
* [Bootstrap](https://getbootstrap.com)
* [JQuery](https://jquery.com)
* [CSS3](https://www.w3schools.com/css/)
# Backend
* [Redis](https://redis.io)
* [Docker](https://www.docker.com)
* [Laravel](https://laravel.com)



<!-- GETTING STARTED -->
## Getting Started

This is an example of how you may give instructions on setting up your project locally.
To get a local copy up and running follow these simple example steps.

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/laithalenooz/Masterpiece-Laith_Al_Enooz.git
   ```
2. Open the terminal in your root directory(project directory) & to install the composer packages run the following command:
   ```sh
   composer install
   ```
3. By running the following command, you will be able to get all the dependencies in your node_modules folder:
   ```sh
   npm install
   ```
4. To run the project, you need to run following command in the project directory. It will compile the php files & all the other project files. If you are making any changes in any of the .php file then you need to run the given command again.
   ```sh
   npm run dev
   ```
5. To serve the application you need to run the following command in the project directory. (This will give you an address with port number 8000.) Now navigate to the given address you will see your application is running.
   ```sh
   php artisan serve
   ```
6. To change the port address, run the following command:
   ```sh
   php artisan serve --port=8080 // For port 8080
   sudo php artisan serve --port=80 // If you want to run it on port 80, you probably need to sudo.
   ```
7. Watching for changes: If you want to watch all the changes you make in the application then run the following command in the root directory.
   ```sh
   npm run watch
   ```
8. Building for Production: If you want to run the project and make the build in the production mode then run the following command in the root directory, otherwise the project will continue to run in the development mode.
   ```sh
   npm run prod
   ```
9. Required Permissions: If you are facing any issues regarding the permissions, then you need to run the following command in your project directory:
   ```sh
   sudo chmod -R o+rw bootstrap/cache
   sudo chmod -R o+rw storage
   ```

<!-- ROADMAP -->
## Roadmap

See the [open issues](https://github.com/laithalenooz/Masterpiece-Laith_Al_Enooz/issues) for a list of proposed features (and known issues).



<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request



<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.



<!-- CONTACT -->
## Contact

Laith Al Enooz - [@ith_al](https://twitter.com/ith_al) - laithalenooz@gmail.com

Project Link: [https://github.com/laithalenooz/Masterpiece-Laith_Al_Enooz](https://github.com/laithalenooz/Masterpiece-Laith_Al_Enooz)



<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/othneildrew/Masterpiece-Laith_Al_Enooz.svg?style=for-the-badge
[contributors-url]: https://github.com/laithalenooz/Masterpiece-Laith_Al_Enooz/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/othneildrew/Masterpiece-Laith_Al_Enooz.svg?style=for-the-badge
[forks-url]: https://github.com/laithalenooz/Masterpiece-Laith_Al_Enooz/network/members
[stars-shield]: https://img.shields.io/github/stars/othneildrew/Masterpiece-Laith_Al_Enooz.svg?style=for-the-badge
[stars-url]: https://github.com/laithalenooz/Masterpiece-Laith_Al_Enooz/stargazers
[issues-shield]: https://img.shields.io/github/issues/othneildrew/Masterpiece-Laith_Al_Enooz.svg?style=for-the-badge
[issues-url]: https://github.com/laithalenooz/Masterpiece-Laith_Al_Enooz/issues
[license-shield]: https://img.shields.io/github/license/othneildrew/Masterpiece-Laith_Al_Enooz.svg?style=for-the-badge
[license-url]: https://github.com/laithalenooz/Masterpiece-Laith_Al_Enooz/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/laithalenooz
[product-screenshot]: images/screenshot.png
