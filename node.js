var cron = require('node-cron');

cron.schedule('* */1 * * * *', () => {
    // Commande Symfony
});