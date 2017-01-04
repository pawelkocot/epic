import {handleActions} from 'redux-actions';
import {LOAD_RESERVATIONS_REQUEST, LOAD_RESERVATIONS_SUCCESS, LOAD_RESERVATIONS_FAILURE} from './actions';

const initialState = {
  loading: false,
  loaded: false,
  failure: false,
  errorMessage: '',

  reservations: []
};

export default handleActions({
  [LOAD_RESERVATIONS_REQUEST]: (state) => ({
    ...state,
    ...initialState,
    loading: true
  }),
  [LOAD_RESERVATIONS_SUCCESS]: (state, {payload:reservations}) => ({
    ...state,
    loading: false,
    loaded: true,
    reservations
  }),
  [LOAD_RESERVATIONS_FAILURE]: (state, {payload:errorMessage}) => ({
    ...state,
    loading: false,
    loaded: false,
    failure: true,
    errorMessage
  })
}, initialState);
