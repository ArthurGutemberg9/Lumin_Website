
import Alpine from 'alpinejs';
import { initTilt, initFollow } from './tilt';
import { initReveal } from './reveal';

window.Alpine = Alpine;

Alpine.start();

initTilt();
initFollow();
initReveal();
