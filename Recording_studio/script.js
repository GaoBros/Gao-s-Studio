const audio = new Audio('path/to/audio.mp3');

audio.addEventListener('canplaythrough', () => {
  console.log('Аудио загружено и готово к воспроизведению');
});

audio.addEventListener('play', () => {
  console.log('Воспроизведение началось');
});

audio.addEventListener('pause', () => {
  console.log('Воспроизведение приостановлено');
});

audio.addEventListener('ended', () => {
  console.log('Воспроизведение завершено');
});

// Начать воспроизведение
audio.play();

// Приостановить воспроизведение
// audio.pause();