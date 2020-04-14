import {
    BrowserRouter as Router,
    Switch,
    Route,
    Link,
    useRouteMatch,
    useParams
} from "react-router-dom";
import ErrorBoundary from '../../Error/ErrorBoundary';
import SignIn from './SignIn';
import LogIn from './LogIn';
import { Button } from '../../Form/Form';

export default function Homepage(props) {
    return (
        <ErrorBoundary>
                <Switch>
                    { props.user && props.user.username ? 
                        <>
                            <div>
                                Hello {props.user.username}!
                            </div>
                        </> :
                        <>
                            <Route path="/login">
                                <LogIn userDispatch={props.userDispatch} />
                            </Route>
                            <Route path="/signin">
                                <SignIn userDispatch={props.userDispatch} />
                            </Route>
                            <Route>
                                <div className="columns has-margin-5">
                                    <Link to="/login">
                                        <Button className='is-horizontal-center' buttonText='Log in'/>
                                    </Link>
                                </div>
                                <div className="columns has-margin-5">
                                    <Link to="/signin">
                                        <Button className='is-horizontal-center' buttonText='Sign in'/>
                                    </Link>
                                </div>
                            </Route>
                        </>
                    }
                </Switch>
        </ErrorBoundary>
    );
}