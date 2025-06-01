import './bootstrap';


// Listen to Laravel Echo channel and event
window.Echo.channel('public-messages').listen('MessageSent', (event) => {
    console.log('Event received', event);
})