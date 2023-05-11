//
//  UserModel.swift
//  swift-mvc
//
//  Created by Felix Schindler on 10.05.23.
//

import Foundation

struct User {
	let id: String
	let name: String
	let bio: String
}

class UserModel {
	public static var shared = UserModel()
	public private(set) var list: Dictionary<String, User>
	
	private init() {
		list = [
			"Felix": User(id: "aabbd79f-d7f9-40c3-8f6e-bd7074b90713", name: "Felix", bio: "Location: Bad Cannstatt\nStudying: Computer Science as a german-chinese double degree"),
			"Sophie": User(id: "4021d3ff-7778-4951-b74c-142c662d964b", name: "Sophie", bio: "Location: Vaihingen\nStudying: Computer Science as a german-chinese double degree")
		]
	}
	
	public func get(name: String) -> User? {
		return list[name]
	}
}
