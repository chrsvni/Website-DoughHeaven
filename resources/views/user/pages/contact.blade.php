@extends('user.layouts.app')

@section('title', 'Contact Us | DoughHeaven')
@section('meta_description',
    'Ada pertanyaan atau masukan? Hubungi DoughHeaven melalui formulir atau informasi kontak
    yang tersedia.')
@section('meta_keywords', 'kontak DoughHeaven, hubungi kami, customer service, layanan pelanggan')

@section('content')
    <!-- Hero Section -->
    <section class="pt-16 relative">
        <div class="h-96 w-full bg-cover bg-center"
            style="background-image: url('https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
            <div class="absolute inset-0 bg-black bg-opacity-60"></div>
            <div class="relative h-full flex flex-col items-center justify-center text-center px-4">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Get in Touch</h1>
                <p class="text-xl md:text-2xl text-white max-w-2xl mx-auto">
                    We'd love to hear from you! Whether you have a question, feedback, or want to place a special order.
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Information -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Address -->
                <div class="text-center p-6 rounded-lg shadow-sm" style="background-color: #faeee7">
                    <div class="inline-block p-4 bg-pink-100 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-pink-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Visit Us</h3>
                    <p class="text-gray-600">Jl. Melong Asih<br>Kota Bandung, No.1</p>
                </div>

                <!-- Phone -->
                <div class="text-center p-6 rounded-lg shadow-sm" style="background-color: #faeee7">
                    <div class="inline-block p-4 bg-pink-100 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-pink-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Call Us</h3>
                    <p class="text-gray-600">+628966726363</p>
                    <p class="text-gray-500 text-sm mt-2">Mon-Fri: 7am - 8pm<br>Sat-Sun: 8am - 9pm</p>
                </div>

                <!-- Email -->
                <div class="text-center p-6 rounded-lg shadow-sm" style="background-color: #faeee7">
                    <div class="inline-block p-4 bg-pink-100 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-pink-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Email Us</h3>
                    <p class="text-gray-600">hello@doughheaven.com</p>
                    <p class="text-gray-500 text-sm mt-2">We'll respond within 24 hours</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form and Map -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Send Us a Message</h2>
                    <form action="{{ route('ulasan.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="nama" class="block text-gray-700 mb-2">Your Name</label>
                            <input type="text" id="nama" name="nama"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 mb-2">Your Email</label>
                            <input type="email" id="email" name="email"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="subjek" class="block text-gray-700 mb-2">Subject</label>
                            <input type="text" id="subjek" name="subjek"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500"
                                required>
                        </div>
                        <div class="mb-6">
                            <label for="isi" class="block text-gray-700 mb-2">Your Message</label>
                            <textarea id="isi" name="isi" rows="5"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500" required></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-pink-600 text-white py-3 rounded-lg hover:bg-pink-700 transition duration-300">
                            Send Message
                        </button>
                    </form>
                </div>

                <!-- Map -->
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Find Us</h2>
                    <div class="h-80 bg-gray-200 rounded-lg overflow-hidden">
                        <!-- Replace with actual map embed code -->
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.215266754809!2d-73.98784492426285!3d40.75798657138946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes%20Square!5e0!3m2!1sen!2sus!4v1710669176096!5m2!1sen!2sus"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <div class="mt-4">
                        <h3 class="font-semibold text-gray-800 mb-2">Store Hours</h3>
                        <ul class="text-gray-600">
                            <li class="flex justify-between py-1">
                                <span>Monday - Friday</span>
                                <span>7:00 AM - 8:00 PM</span>
                            </li>
                            <li class="flex justify-between py-1">
                                <span>Saturday</span>
                                <span>8:00 AM - 9:00 PM</span>
                            </li>
                            <li class="flex justify-between py-1">
                                <span>Sunday</span>
                                <span>8:00 AM - 7:00 PM</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-12 bg-white">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Frequently Asked Questions</h2>

            <div class="space-y-6">
                <div class="rounded-lg p-6" style="background-color: #faeee7">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Do you offer catering services?</h3>
                    <p class="text-gray-600">Yes! We offer catering for events of all sizes. Please contact us at least 48
                        hours in advance for large orders.</p>
                </div>

                <div class="rounded-lg p-6" style="background-color: #faeee7">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Can I place a custom order?</h3>
                    <p class="text-gray-600">Absolutely! We love creating custom donuts for special occasions. Please give
                        us at least 3-5 days notice for custom orders.</p>
                </div>

                <div class="rounded-lg p-6" style="background-color: #faeee7">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Do you have gluten-free or vegan options?</h3>
                    <p class="text-gray-600">We offer a selection of gluten-free and vegan donuts daily. Please call ahead
                        to check availability or to place a special order.</p>
                </div>

                <div class="rounded-lg p-6" style="background-color: #faeee7">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Do you deliver?</h3>
                    <p class="text-gray-600">We offer delivery within a 5-mile radius for orders over $25. We also partner
                        with several delivery services for wider coverage.</p>
                </div>
            </div>
        </div>
    </section>

    <script>
        const {
            createApp,
            ref
        } = Vue;
        createApp({
            setup() {
                const mobileMenuOpen = ref(false);
                const form = ref({
                    name: '',
                    email: '',
                    subject: '',
                    message: ''
                });

                const submitForm = () => {
                    // In a real application, you would send the form data to a server
                    alert('Thank you for your message! We will get back to you soon.');
                    // Reset form
                    form.value = {
                        name: '',
                        email: '',
                        subject: '',
                        message: ''
                    };
                };

                const toggleMobileMenu = () => {
                    mobileMenuOpen.value = !mobileMenuOpen.value;
                };

                const closeMenu = () => {
                    mobileMenuOpen.value = false;
                };

                return {
                    mobileMenuOpen,
                    form,
                    toggleMobileMenu,
                    closeMenu,
                    submitForm
                };
            }
        }).mount('#app');
    </script>
@endsection
