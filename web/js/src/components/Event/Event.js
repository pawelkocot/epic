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
        <PageHeader>Event "{event.name}" ID: {event.id}, group: {event.group}</PageHeader>

        {reservationsLoading && <div>Loading reservations...</div>}
        {reservationsLoadingFailure && <div>Loading reservations failure: {reservationsLoadingError}</div>}
        {reservationsLoaded && <ReservationsTable reservations={reservations} />}
      </div>
    );
  }
}

const mapStateToProps = (state, props) => {
  const event = state.events.events.find(event => event.id == props.params.id);

  return {
    event,
    reservations: state.reservations.reservations,
    reservationsLoading: state.reservations.loading,
    reservationsLoaded: state.reservations.loaded,
    reservationsLoadingFailure: state.reservations.failure,
    reservationsLoadingError: state.reservations.errorMessage,
  }
}

const mapDispatchToProps = {
  loadReservations
};

export default connect(mapStateToProps, mapDispatchToProps)(EventsContainer);
