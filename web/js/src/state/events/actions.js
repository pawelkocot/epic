import {createAction} from 'redux-actions';
import loadEventsRequest from '../../services/api/loadEventsRequest';
import uploadAttachmentRequest from '../../services/api/uploadAttachmentRequest';

export const LOAD_EVENTS_REQUEST = 'EVENTS/LOAD_REQUEST';
export const LOAD_EVENTS_SUCCESS = 'EVENTS/LOAD_SUCCESS';
export const LOAD_EVENTS_FAILURE = 'EVENTS/LOAD_FAILURE';

export const CREATE_EVENT_SUCCESS = 'EVENT/CREATE_SUCCESS';

const requestEvents = createAction(LOAD_EVENTS_REQUEST);
const eventsLoadingSuccess = createAction(LOAD_EVENTS_SUCCESS);
const eventsLoadingFailure = createAction(LOAD_EVENTS_FAILURE);

export const loadEvents = () => (dispatch) => {
  dispatch(requestEvents());

  loadEventsRequest()
    .then(events => dispatch(eventsLoadingSuccess(events)))
    .catch(error => {
      dispatch(eventsLoadingFailure(error))
    })
};

export const createEventSuccess = createAction(CREATE_EVENT_SUCCESS);

export const UPLOAD_ATTACHMENT_REQUEST = 'UPLOAD_ATTACHMENT/REQUEST';
export const UPLOAD_ATTACHMENT_SUCCESS = 'UPLOAD_ATTACHMENT/SUCCESS';
export const UPLOAD_ATTACHMENT_FAILURE = 'UPLOAD_ATTACHMENT/FAILURE';

const startUploading = createAction(UPLOAD_ATTACHMENT_REQUEST);
const uploadSuccess = createAction(UPLOAD_ATTACHMENT_SUCCESS);
const uploadFailure = createAction(UPLOAD_ATTACHMENT_FAILURE);

export const uploadAttachment = (eventId, attachment) => (dispatch) => {
  dispatch(startUploading());

  uploadAttachmentRequest(eventId, attachment)
    .then(event => dispatch(uploadSuccess(event)))
    .catch(error => {
      dispatch(uploadFailure(error))
    });
};
