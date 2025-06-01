import './bootstrap';



// Listen to Laravel Echo channel and event with public channel
window.Echo.channel('public-messages').listen('MessageSent', (event) => {
    console.log('Event received', event);
})


