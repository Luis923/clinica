const critical = require('critical');

critical.generate({
  base: 'vista/front/',
  src: './formlogin.html',
  target: 'styles/styles.min.css',
  width: 1300,
  height: 900,
}, (err, output) => {
  if (err) {
    console.error(err);
  } else if (output) {
    console.log('Generated critical CSS');
  }
});