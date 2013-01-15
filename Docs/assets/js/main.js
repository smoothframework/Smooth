var Person = function(config)
{
	this.name = config.name;
	this.age = config.age;
	this.occupation = config.occupation;
};

Person.prototype.work = function()
{
	return this.name = this.name + ' is working as a developer.';
};