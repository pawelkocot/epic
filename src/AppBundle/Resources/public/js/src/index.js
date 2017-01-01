import {bootstrap, renderApplication} from './boot';

const mountNode = document.getElementById('root');
const {store, history} = bootstrap();

renderApplication(mountNode, store, history);
