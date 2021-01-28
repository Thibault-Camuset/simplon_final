var cron = require('node-cron');
const { exec } = require("child_process");

cron.schedule('1 */1 * * * *', () => {
    exec("php bin/console app:refill-action-points refill" , (error, stdout, stderr) => {
        if (error) {
            console.log(`error: ${error.message}`);
            return;
        }
        if (stderr) {
            console.log(`stderr: ${stderr}`);
            return;
        }
        console.log(`stdout: ${stdout}`);
    });
});

// cron.schedule('1 */1 * * * *', () => {
//     console.log('Toto');
// });