<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-jet-nav-link>
                </div>

                <x-nav-dropdown title="Apps" align="right" width="48">
                        @can('view-any', App\Models\Address::class)
                        <x-dropdown-link href="{{ route('addresses.index') }}">
                        Addresses
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Banner::class)
                        <x-dropdown-link href="{{ route('banners.index') }}">
                        Banners
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Carousel::class)
                        <x-dropdown-link href="{{ route('carousels.index') }}">
                        Carousels
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Cart::class)
                        <x-dropdown-link href="{{ route('carts.index') }}">
                        Carts
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Category::class)
                        <x-dropdown-link href="{{ route('categories.index') }}">
                        Categories
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Content::class)
                        <x-dropdown-link href="{{ route('contents.index') }}">
                        Contents
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Invoice::class)
                        <x-dropdown-link href="{{ route('invoices.index') }}">
                        Invoices
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Order::class)
                        <x-dropdown-link href="{{ route('orders.index') }}">
                        Orders
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\OrderItem::class)
                        <x-dropdown-link href="{{ route('order-items.index') }}">
                        Order Items
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Product::class)
                        <x-dropdown-link href="{{ route('products.index') }}">
                        Products
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\ProductCategory::class)
                        <x-dropdown-link href="{{ route('product-categories.index') }}">
                        Product Categories
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Review::class)
                        <x-dropdown-link href="{{ route('reviews.index') }}">
                        Reviews
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\StoreSetting::class)
                        <x-dropdown-link href="{{ route('store-settings.index') }}">
                        Store Settings
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\UiSetting::class)
                        <x-dropdown-link href="{{ route('ui-settings.index') }}">
                        Ui Settings
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\User::class)
                        <x-dropdown-link href="{{ route('users.index') }}">
                        Users
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\BlogCategory::class)
                        <x-dropdown-link href="{{ route('blog-categories.index') }}">
                        Blog Categories
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\BlogPost::class)
                        <x-dropdown-link href="{{ route('blog-posts.index') }}">
                        Blog Posts
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\BlogPostTag::class)
                        <x-dropdown-link href="{{ route('blog-post-tags.index') }}">
                        Blog Post Tags
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\BlogTag::class)
                        <x-dropdown-link href="{{ route('blog-tags.index') }}">
                        Blog Tags
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Contact::class)
                        <x-dropdown-link href="{{ route('contacts.index') }}">
                        Contacts
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\NetworkTeam::class)
                        <x-dropdown-link href="{{ route('network-teams.index') }}">
                        Network Teams
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\ProductImage::class)
                        <x-dropdown-link href="{{ route('product-images.index') }}">
                        Product Images
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Quote::class)
                        <x-dropdown-link href="{{ route('quotes.index') }}">
                        Quotes
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\Transaction::class)
                        <x-dropdown-link href="{{ route('transactions.index') }}">
                        Transactions
                        </x-dropdown-link>
                        @endcan
                        @can('view-any', App\Models\UserStoreCredit::class)
                        <x-dropdown-link href="{{ route('user-store-credits.index') }}">
                        User Store Credits
                        </x-dropdown-link>
                        @endcan
                </x-nav-dropdown>

                    @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) || 
                        Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                    <x-nav-dropdown title="Access Management" align="right" width="48">
                        
                        @can('view-any', Spatie\Permission\Models\Role::class)
                        <x-dropdown-link href="{{ route('roles.index') }}">Roles</x-dropdown-link>
                        @endcan
                    
                        @can('view-any', Spatie\Permission\Models\Permission::class)
                        <x-dropdown-link href="{{ route('permissions.index') }}">Permissions</x-dropdown-link>
                        @endcan
                        
                    </x-nav-dropdown>
                    @endif
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-jet-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-jet-switchable-team :team="$team" />
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>
            
                @can('view-any', App\Models\Address::class)
                <x-jet-responsive-nav-link href="{{ route('addresses.index') }}">
                Addresses
                </x-jet-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Banner::class)
                <x-jet-responsive-nav-link href="{{ route('banners.index') }}">
                Banners
                </x-jet-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Carousel::class)
                <x-jet-responsive-nav-link href="{{ route('carousels.index') }}">
                Carousels
                </x-jet-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Cart::class)
                <x-jet-responsive-nav-link href="{{ route('carts.index') }}">
                Carts
                </x-jet-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Category::class)
                <x-jet-responsive-nav-link href="{{ route('categories.index') }}">
                Categories
                </x-jet-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Content::class)
                <x-jet-responsive-nav-link href="{{ route('contents.index') }}">
                Contents
                </x-jet-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Invoice::class)
                <x-jet-responsive-nav-link href="{{ route('invoices.index') }}">
                Invoices
                </x-jet-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Order::class)
                <x-jet-responsive-nav-link href="{{ route('orders.index') }}">
                Orders
                </x-jet-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\OrderItem::class)
                <x-jet-responsive-nav-link href="{{ route('order-items.index') }}">
                Order Items
                </x-jet-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Product::class)
                <x-jet-responsive-nav-link href="{{ route('products.index') }}">
                Products
                </x-jet-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\ProductCategory::class)
                <x-jet-responsive-nav-link href="{{ route('product-categories.index') }}">
                Product Categories
                </x-jet-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Review::class)
                <x-jet-responsive-nav-link href="{{ route('reviews.index') }}">
                Reviews
                </x-jet-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\StoreSetting::class)
                <x-jet-responsive-nav-link href="{{ route('store-settings.index') }}">
                Store Settings
                </x-jet-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\UiSetting::class)
                <x-jet-responsive-nav-link href="{{ route('ui-settings.index') }}">
                Ui Settings
                </x-jet-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\User::class)
                <x-jet-responsive-nav-link href="{{ route('users.index') }}">
                Users
                </x-jet-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\BlogCategory::class)
                <x-jet-responsive-nav-link href="{{ route('blog-categories.index') }}">
                Blog Categories
                </x-jet-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\BlogPost::class)
                <x-jet-responsive-nav-link href="{{ route('blog-posts.index') }}">
                Blog Posts
                </x-jet-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\BlogPostTag::class)
                <x-jet-responsive-nav-link href="{{ route('blog-post-tags.index') }}">
                Blog Post Tags
                </x-jet-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\BlogTag::class)
                <x-jet-responsive-nav-link href="{{ route('blog-tags.index') }}">
                Blog Tags
                </x-jet-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Contact::class)
                <x-jet-responsive-nav-link href="{{ route('contacts.index') }}">
                Contacts
                </x-jet-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\NetworkTeam::class)
                <x-jet-responsive-nav-link href="{{ route('network-teams.index') }}">
                Network Teams
                </x-jet-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\ProductImage::class)
                <x-jet-responsive-nav-link href="{{ route('product-images.index') }}">
                Product Images
                </x-jet-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Quote::class)
                <x-jet-responsive-nav-link href="{{ route('quotes.index') }}">
                Quotes
                </x-jet-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\Transaction::class)
                <x-jet-responsive-nav-link href="{{ route('transactions.index') }}">
                Transactions
                </x-jet-responsive-nav-link>
                @endcan
                @can('view-any', App\Models\UserStoreCredit::class)
                <x-jet-responsive-nav-link href="{{ route('user-store-credits.index') }}">
                User Store Credits
                </x-jet-responsive-nav-link>
                @endcan

                @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) || 
                    Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                    
                    @can('view-any', Spatie\Permission\Models\Role::class)
                    <x-jet-responsive-nav-link href="{{ route('roles.index') }}">Roles</x-jet-responsive-nav-link>
                    @endcan
                
                    @can('view-any', Spatie\Permission\Models\Permission::class)
                    <x-jet-responsive-nav-link href="{{ route('permissions.index') }}">Permissions</x-jet-responsive-nav-link>
                    @endcan
                    
                @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-jet-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-jet-responsive-nav-link>
                    @endcan

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</nav>