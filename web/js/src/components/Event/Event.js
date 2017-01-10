import React from 'react';
import {connect} from 'react-redux';
import {PageHeader} from 'react-bootstrap';
import {loadReservations} from '../../state/actions';
import {hashHistory} from 'react-router';
import ReservationsTable from './ReservationsTable';

class EventsContainer extends React.Component {
  componentWillMount() {
    if (this.props.event) {
      if (!this.props.reservationsLoading) {
        this.props.loadReservations(this.props.event.id);
      }
    } else {
      hashHistory.push('/');
    }
  }

  render() {
    const {event, reservations} = this.props;
    const {reservationsLoading, reservationsLoadingFailure, reservationsLoadingError, reservationsLoaded} = this.props;

    if (!event) {
      return <PageHeader bsClass="danger">Event not found</PageHeader>
    }

    return (
      <div>
        <PageHeader>Event "{event.name}" ID: {event.id}, group: {event.groupName}</PageHeader>

        {reservationsLoading && <div>Loading reservations...</div>}
        {reservationsLoadingFailure && <div>Loading reservations failure: {reservationsLoadingError}</div>}
        {reservationsLoaded && <ReservationsTable reservations={reservations} event={event} />}
      </div>
    );
  }
}

const mapStateToProps = (state, props) => {
  const event = state.app.events.events.find(event => parseInt(event.id, 10) === parseInt(props.params.id, 10));

  return {
    event,
    reservations: state.app.reservations.reservations,
    reservationsLoading: state.app.reservations.loading,
    reservationsLoaded: state.app.reservations.loaded,
    reservationsLoadingFailure: state.app.reservations.failure,
    reservationsLoadingError: state.app.reservations.errorMessage,
  }
}

const mapDispatchToProps = {
  loadReservations
};

export default connect(mapStateToProps, mapDispatchToProps)(EventsContainer);
