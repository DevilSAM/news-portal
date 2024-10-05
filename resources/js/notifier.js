import { useToast } from 'vue-toastification';
const toast = useToast()
window.Echo.channel('users')
    .listen('.registered', (event) => {
        toast.success(`Зарегистрирован новый пользователь: ${event.user.name}`);
    })
    .listen('.loggedin', (event) => {
        toast.info(`${event.user.name} вошел в систему`);
    });
