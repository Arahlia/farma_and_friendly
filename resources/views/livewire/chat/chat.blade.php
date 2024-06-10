
<div x-data="{ isOpen: false }" class="fixed flex bg-white border lg:shadow-sm overflow-hidden inset-0 lg:top-16 lg:inset-x-2 m-auto lg:h-[90%] rounded-t-lg lg:mt-14 mt-28 lg:mb-0 mb--28">
    <!-- Chat List -->
    <div class="relative w-full md:w-[320px] xl:w-[400px] overflow-y-auto shrink-0 h-full border-r" :class="{'block': isOpen, 'hidden': !isOpen, 'md:block': true}">
        <livewire:chat.chat-list :selectedConversation="$selectedConversation" :query="$query">
    </div>

    <!-- Chat Box -->
    <div class="grid flex-1 border-l h-full relative overflow-y-auto " style="contain:content">
        <livewire:chat.chat-box :selectedConversation="$selectedConversation">
    </div>

    <!-- Toggle Button for Mobile -->
    <div class="fixed top-10 left-48 lg:hidden md:hidden">
        <button @click="isOpen = !isOpen" class="bg-customPurple-500 text-white p-2 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
    </div>
</div>

