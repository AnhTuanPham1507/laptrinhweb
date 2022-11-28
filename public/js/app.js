function setUpdatingOwnerMember(id, name, birthday, gender, relationship, owner_id) {
	const updatingGender = document.getElementById('updatingGender')
	const updatingRelationship = document.getElementById('updatingRelationship')
	const updatingOwner = document.getElementById('updatingOwner')


	document.getElementById("updatingId").value = id
	document.getElementById("updatingName").value = name
	document.getElementById("updatingBirthday").value = birthday.slice(0, 10);

	let updatingGenderLength = updatingGender.options.length
	for (let i = 0; i < updatingGenderLength; i++) {
		if (updatingGender.options[i].value === gender) {
			updatingGender.options.selectedIndex = i
		}
	}

	let updatingRelationshipLength = updatingRelationship.options.length
	for (let i = 0; i < updatingRelationshipLength; i++) {
		if (updatingRelationship.options[i].value === relationship) {
			updatingRelationship.options.selectedIndex = i
		}
	}

	let updatingOwnerLength = updatingOwner.options.length
	for (let i = 0; i < updatingOwnerLength; i++) {
		if (updatingOwner.options[i].value === owner_id) {
			updatingOwner.options.selectedIndex = i
		}
	}

}

function setDeletingOwnerMember(id) {
	document.getElementById("deletingId").value = id
}

