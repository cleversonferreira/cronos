import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Projects extends Component {

    constructor(){
        super();
        this.state = {
            data: []
        }
    }

    componentWillMount(){
        let $this = this;

        axios.get('/cronos/all').then(response => {
            $this.setState({
                data: response.data
            })
        }).catch(error => {
            console.log(error)
        })
    }

    render() {
        return (

            <table className="table table-dark">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Deadline</th>
                    <th scope="col">Progress</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>

                {this.state.data.map((cronos, i) => (
                    <tr>
                        <th>{cronos.id}</th>
                        <th>{cronos.name}</th>
                        <th>{cronos.deadline_end}</th>
                        <th>{cronos.progress}%</th>
                        <th>
                            <a href={'/cronos/' + cronos.id}>view</a> |
                            <a href={'/cronos/edit/' + cronos.id}>edit</a> |
                            <a href={'/cronos/delete/' + cronos.id}>delete</a>
                        </th>
                    </tr>
                    )
                )}
                </tbody>
            </table>
        );
    }
}

if (document.getElementById('projects')) {
    ReactDOM.render(<Projects />, document.getElementById('projects'));
}
