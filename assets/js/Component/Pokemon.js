import Homepage from './App/Homepage';
import Message from './App/Message';
import { useReducer, useEffect, useState } from 'react';
import ErrorBoundary from '../Error/ErrorBoundary';

import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link,
  useRouteMatch,
  useParams
} from "react-router-dom";
import { Navbar } from './App/Navbar';

function reducer(user, action) {
    switch (action.type) {
        case 'update':
            console.log('update, payload', action.payload);
            return Object.assign({}, user, action.payload);
        case 'login':
            console.log('login, payload', action.payload);
            return Object.assign({}, user, action.payload);
        case 'logout':
            console.log('logout');
            return {user: null};
    }
}
export default function Pokemon() {
    const [user, userDispatch] = useReducer(reducer, null);
    //const [user, setUser] = useState(window.user);
    useEffect(() => {
        if(window.user) {
            userDispatch({type: 'login', payload: window.user});
        }       
    }, []);

    useEffect(() => {
        console.log('inside pokemon', user);
        //setUser(state);
    });

    return (
        <ErrorBoundary>
            <Router>
                <Navbar user={user} userDispatch={userDispatch}/>
                { user && user.message && <Message message={user.message}/> }
                <section className="section">
                    <div className="container">
                        <Switch>
                            <Route>
                                <Homepage user={user} userDispatch={userDispatch} />
                            </Route>
                        </Switch>
                    </div>
                </section>
            </Router>
        </ErrorBoundary>
    );
}

