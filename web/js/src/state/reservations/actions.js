import {createAction} from 'redux-actions';
import loadReservationsRequest from '../../services/api/loadReservationsRequest';

export const LOAD_RESERVATIONS_REQUEST = 'RESERVATIONS/LOAD_REQUEST';
export const LOAD_RESERVATIONS_SUCCESS = 'RESERVATIONS/LOAD_SUCCESS';
export const LOAD_RESERVATIONS_FAILURE = 'RESERVATIONS/LOAD_FAILURE';

const requestReservations = createAction(LOAD_RESERVATIONS_REQUEST);
const reservationsLoadingSuccess = createAction(LOAD_RESERVATIONS_SUCCESS);
const reservationsLoadingFailure = createAction(LOAD_RESERVATIONS_FAILURE);

export const loadReservations = (eventId) => (dispatch) => {
  dispatch(requestReservations());

  loadReservationsRequest(eventId)
    .then(reservations => dispatch(reservationsLoadingSuccess(reservations)))
    .catch(error => {
      console.log(error);
      dispatch(reservationsLoadingFailure(error))
    })
};
