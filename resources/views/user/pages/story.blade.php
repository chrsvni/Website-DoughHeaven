@extends('user.layouts.app')

@section('title', 'Our Story | DoughHeaven')
@section('meta_description', 'Kenali perjalanan DoughHeaven dalam menghadirkan donat terbaik dari bahan berkualitas.')
@section('meta_keywords', 'sejarah DoughHeaven, tentang kami, donat premium')

@section('content')
    <!-- Hero Section -->
    <section class="pt-16">
        <div class="relative h-screen">
            <div class="w-full h-full">
                <img src="https://images.unsplash.com/photo-1517433670267-08bbd4be890f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                    alt="DoughHeaven Bakery" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            </div>

            <div class="absolute inset-0 flex items-center justify-center">
                <div class="text-center">
                    <h2 class="text-4xl md:text-6xl font-bold text-white mb-4">Welcome to DoughHeaven</h2>
                    <p class="text-xl text-white mb-8">Where every bite feels like heaven.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Sweet Journey Section -->
    <section class="py-16" style="background-color: #faeee7">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Our Sweet Journey</h2>
                <div class="w-24 h-1 bg-pink-600 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">Founded in 2020, DoughHeaven began with a simple mission: to
                    create the most delicious, handcrafted donuts using only premium ingredients and traditional baking
                    techniques.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                <div class="rounded-lg overflow-hidden shadow-lg">
                    <img src="https://images.unsplash.com/photo-1556911220-e15b29be8c8f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="DoughHeaven Founders" class="w-full h-64 object-cover">
                    <div class="p-6 bg-gray-50">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Our Founders</h3>
                        <p class="text-gray-600">What started as a small family operation has grown into a beloved local
                            institution, but our commitment to quality and creativity has never wavered.</p>
                    </div>
                </div>

                <div class="rounded-lg overflow-hidden shadow-lg">
                    <img src="https://images.unsplash.com/photo-1517433367423-c7e5b0f35086?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="DoughHeaven Kitchen" class="w-full h-64 object-cover">
                    <div class="p-6 bg-gray-50">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Our Kitchen</h3>
                        <p class="text-gray-600">Every morning, our bakers arrive before dawn to prepare fresh batches of
                            donuts using time-honored techniques and the finest ingredients available.</p>
                    </div>
                </div>
            </div>

            <div class="text-gray-600 max-w-3xl mx-auto">
                <p class="mb-4">From our humble beginnings with just three classic flavors, we've expanded our menu to
                    include over 30 unique varieties, each one crafted with the same care and attention to detail that has
                    made DoughHeaven a local favorite.</p>
                <p>As we've grown, we've remained true to our core values: quality ingredients, handcrafted preparation, and
                    a commitment to creating moments of joy for our customers.</p>
            </div>
        </div>
    </section>

    <!-- Philosophy Cards Section -->
    <section class="py-16" style="background-color: #fffffe;">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Our Philosophy</h2>
                <div class="w-24 h-1 bg-pink-600 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">At DoughHeaven, we believe in creating more than just donuts â
                    we're creating experiences, memories, and moments of joy.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Meet the Team Card -->
                <div class="rounded-lg shadow-lg overflow-hidden" style="background-color: #faeee7;">
                    <img src="https://images.unsplash.com/photo-1556911073-a517e752729c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="DoughHeaven Team" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-4" style="color: #33272a;">Meet the Dough Dream Team</h3>
                        <p class="text-gray-600">Behind every glazed ring is a passionate team of bakers, dreamers, and
                            donut-lovers who wake up early (really early!) just to make sure your box of joy is fresh and
                            perfect.</p>
                        <p class="text-gray-600 mt-4">Whether it's your morning pick-me-up or your late-night treat â we
                            got you.</p>
                    </div>
                </div>

                <!-- Our Mission Card -->
                <div class="rounded-lg shadow-lg overflow-hidden" style="background-color: #faeee7;">
                    <img src="https://images.unsplash.com/photo-1556742502-ec7c0e9f34b1?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="DoughHeaven Mission" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-4" style="color: #33272a;">Our Mission</h3>
                        <p class="text-gray-600">To spread a little sweetness, one donut at a time.</p>
                        <p class="text-gray-600 mt-4">We hope to grow beyond our little corner, but no matter how far we go,
                            our hearts will always be in the kitchen â baking happiness for you.</p>
                    </div>
                </div>

                <!-- Why DoughHeaven Card -->
                <div class="rounded-lg shadow-lg overflow-hidden" style="background-color: #faeee7;">
                    <img src="https://images.unsplash.com/photo-1556745757-8d76bdb6984b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                        alt="DoughHeaven Name" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-4" style="color: #33272a;">Why "DoughHeaven"?</h3>
                        <p class="text-gray-600">It's simple:</p>
                        <p class="text-pink-600"><strong>Dough</strong> for what we love.</p>
                        <p class="text-pink-600"><strong>Heaven</strong> for how it tastes.</p>
                        <p class="text-gray-600 mt-4">DoughHeaven is our happy place â and we hope it becomes yours, too.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Team Section -->
    <section class="py-16" style="background-color: #faeee7">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Our Team</h2>
                <div class="w-24 h-1 bg-pink-600 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">Meet the passionate people who make the magic happen every day at
                    DoughHeaven.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Team Member 1 -->
                <div class="text-center">
                    <div class="mb-4 relative rounded-full overflow-hidden w-48 h-48 mx-auto">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&h=300&q=80"
                            alt="Sarah Johnson" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Sarah Johnson</h3>
                    <p class="text-pink-600">Founder & Head Baker</p>
                    <p class="text-gray-600 mt-2">The creative genius behind our signature recipes.</p>
                </div>

                <!-- Team Member 2 -->
                <div class="text-center">
                    <div class="mb-4 relative rounded-full overflow-hidden w-48 h-48 mx-auto">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&h=300&q=80"
                            alt="Michael Thompson" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Michael Thompson</h3>
                    <p class="text-pink-600">Co-Founder & Operations</p>
                    <p class="text-gray-600 mt-2">Ensures everything runs smoothly behind the scenes.</p>
                </div>

                <!-- Team Member 3 -->
                <div class="text-center">
                    <div class="mb-4 relative rounded-full overflow-hidden w-48 h-48 mx-auto">
                        <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&h=300&q=80"
                            alt="Emily Rodriguez" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">Emily Rodriguez</h3>
                    <p class="text-pink-600">Master Decorator</p>
                    <p class="text-gray-600 mt-2">The artistic talent behind our beautiful creations.</p>
                </div>

                <!-- Team Member 4 -->
                <div class="text-center">
                    <div class="mb-4 relative rounded-full overflow-hidden w-48 h-48 mx-auto">
                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&h=300&q=80"
                            alt="David Chen" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-xl font-bold text-gray-800">David Chen</h3>
                    <p class="text-pink-600">Customer Experience</p>
                    <p class="text-gray-600 mt-2">Dedicated to making every visit special.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Our Testimonials</h2>
                <div class="w-24 h-1 bg-pink-600 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">Don't just take our word for it - hear from our satisfied
                    customers.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="text-pink-600 mb-4">★★★★★</div>
                    <p class="text-gray-600 italic mb-4">"The best donuts I've ever had! The Classic Glazed is perfection,
                        and the staff is always friendly."</p>
                    <p class="font-semibold">- Sarah Johnson</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="text-pink-600 mb-4">★★★★★</div>
                    <p class="text-gray-600 italic mb-4">"DoughHeaven's donuts are worth every calorie! My kids love the
                        Chocolate Heaven, and I can't resist the Strawberry Bliss."</p>
                    <p class="font-semibold">- Michael Thompson</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow">
                    <div class="text-pink-600 mb-4">★★★★★</div>
                    <p class="text-gray-600 italic mb-4">"I ordered a dozen for my office, and they were gone in minutes!
                        Everyone keeps asking when I'll bring more."</p>
                    <p class="font-semibold">- Emily Rodriguez</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Closing Message Section -->
    <section class="py-16" style="background-color: #faeee7">
        <div class="max-w-3xl mx-auto px-4 text-center">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6">Wanna know a secret?</h2>
            <p class="text-xl text-gray-600 mb-4">The best donut is the one you share.</p>
            <p class="text-xl text-gray-600 mb-4">So bring a friend. Bring a smile. Bring your appetite.</p>
            <p class="text-xl text-gray-600 mb-4">We'll take care of the rest. ð</p>
            <a href="menu.html"
                class="mt-8 bg-pink-600 text-white px-8 py-3 rounded-full hover:bg-pink-700 transition duration-300 inline-block shadow-lg">View
                Our Menu</a>
        </div>
    </section>
@endsection
