import Home from "./modul/Home.jsx";
import SignUp  from "./modul/SignUp.jsx";
import SignIn  from"./modul/SignIn.jsx";
import Dashboard from "./modul/Dashboard.jsx"
import Article from "./modul/Article.jsx"
import ExerciseGuide from "./modul/ExerciseGuide.jsx"
import ExerciseDetail from "./modul/ExerciseDetail.jsx"
import MealPlan from "./modul/MealPlan.jsx"
import MealDetail from "./modul/MealDetail.jsx"
import {Routes, Route} from "react-router-dom"
import SchedulingApp from "./modul/Scheduling.jsx";
import CaloriesCalculator from "./modul/calculator.jsx";
import AddWorkoutForm from "./modul/AddWorkout.jsx";

export default function App() {
  return (
  <Routes>
    <Route path="/" element={<Home/>} />
    <Route path="/signup" element={<SignUp/>}/>
    <Route path="/signin" element={<SignIn/>}/>
    <Route path="/dashboard" element={<Dashboard/>}/>
    <Route path="/article/:id" element={<Article/>}/>
    <Route path="/exercise-guide" element={<ExerciseGuide/>}/>
    <Route path="/exercise/:id" element={<ExerciseDetail/>}/>
    <Route path="/meal-plan" element={<MealPlan/>}/>
    <Route path="/meal/:id" element={<MealDetail/>}/>
    <Route path="/scheduling" element={<SchedulingApp/>}/>
    <Route path="/calories-calculator" element={<CaloriesCalculator/>}/>
    <Route path="/add-workout" element={<AddWorkoutForm/>}/>
  </Routes>
  );
}


