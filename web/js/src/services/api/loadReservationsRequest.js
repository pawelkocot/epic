import {get} from './_apiRequest';

export default (eventId) => get(`reservations/${eventId}`);
