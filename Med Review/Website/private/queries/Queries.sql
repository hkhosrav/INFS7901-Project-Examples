/* Find residents on antipsychotic on most recent review  - nested subquery*/
SELECT Res.FirstName as ResFirst, Res.LastName as ResLast, 
	P.FirstName as PFirst, P.LastName as PLast, 
	D.FirstName as DFirst, D.LastName as DLast, 
	Rev1.ReferralDate, Rev1.ReviewDate, Med.Class
FROM Review Rev1, ResidentRx Rx, Medication Med, Resident Res, Pharmacist P, Doctor D
WHERE Rev1.RevID = Rx.RevID 
	AND Res.ResidentID = Rev1.ResidentID
	 AND P.PharmID = Rev1.PharmID
	 AND D.DoctorID = Rev1.DoctorID
	 AND Rx.MedID = Med.MedID 
	 AND Med.Class = 'Antipsychotic' 
	 AND Rev1.ReviewDate = (
	 	SELECT MAX(ReviewDate)
	 	FROM Review Rev2
	 	WHERE Rev1.ResidentID = Rev2.ResidentID);

/* Find Resident's who don't have reviews  - existential query */
SELECT *
FROM Residents
WHERE ResidentID NOT IN (
	SELECT ResidentID
	FROM Review);

/* Find emails */
SELECT FirstName LastName PersonalEmail
FROM Doctors;

SELECT CCFirstName CCLastName Name Email
FROM Facility;

/* Find pharmacists who have written recommendations for all the reviews they have been assigned - double negation query */
SELECT P.PharmID
FROM Pharmacist P
WHERE P.PharmID NOT IN (
SELECT Rev.PharmID
FROM Review Rev
WHERE NOT EXISTS (
SELECT Rev.RevID
FROM Recommendation Rec
WHERE Rev.RevID = Rec.RevID AND Rev.PharmID = P.PharmID));

/* Find pharmacists who have not written recommendations for all the reviews they have been assigned */
SELECT P.FirstName, P.LastName
FROM Pharmacist P
WHERE P.PharmID IN (
SELECT Rev.RevID
FROM Review Rev
WHERE NOT EXISTS (
SELECT Rev.RevID
FROM Recommendation Rec
WHERE Rev.RevID = Rec.RevID AND Rev.PharmID = P.PharmID));

/* Find details of residents in antipsychotic table (have been on an antipsychotic at some point) */
SELECT Res.FirstName, Res.LastName, Rev.ReviewDate, Med.GenericName 
FROM Antipsychotic A, Review Rev, Resident Res, Medication Med 
WHERE A.RevID = Rev.RevID 
AND A.ResidentID = Res.ResidentID 
AND A.MedID = Med.MedID;


